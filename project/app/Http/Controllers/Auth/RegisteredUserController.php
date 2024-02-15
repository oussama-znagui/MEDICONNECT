<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register', [
            'roles' => Role::all(),
            'specialty' => Specialty::all(),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' =>['required'],
            'specialty_id' => [
                Rule::requiredIf(function () use ($request) {
                    return $request->role_id == 3;
                }),
            ],
            'nss' => [
                Rule::requiredIf(function () use ($request) {
                    return $request->role_id == 2;
                }),
            ],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'sexe' => $request->sexe,
            'birthDate' => $request->birthDate,

        ]);

        switch ($request->role_id) {
            case 1:
                $user->assignRole('admin');
                event(new Registered($user));
                Auth::login($user);
                return redirect(RouteServiceProvider::HOME);
                break;
            case 3:
                $user->assignRole('doctor');
                event(new Registered($user));
                Auth::login($user);

                Doctor::create([
                    'user_id' => Auth::id(),
                    'specialty_id' => $validated['specialty_id'],
                ]);

                return redirect(RouteServiceProvider::HOME);
                break;
            case 2:
                $user->assignRole('patient');
                event(new Registered($user));
                Auth::login($user);
                return redirect(RouteServiceProvider::HOME);
                break;
        }


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
