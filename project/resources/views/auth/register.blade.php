<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- sexe -->
        <div class="mt-4">
            <x-input-label for="sexe" :value="__('sexe')" />
            <select id="sexe" class="block mt-1 w-full" name="sexe" :value="old('sexe')" autofocus autocomplete="sexe">
                <option value="h">Homme</option>
                <option value="f">Femme</option>
            </select>
            <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="birthDate" :value="__('birthDate')" />
            <x-text-input type='date' id="birthDate" class="block mt-1 w-full" name="birthDate" :value="old('birthDate')" autofocus autocomplete="birthDate" />

            <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="">role</label>
            <select id="roleSelect" name="role_id" class="border-2  w-full bg-gray-100 text-gray-900  p-3 rounded-lg focus:outline-none focus:shadow-outline">
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>

        <div id="specialtySelectContainer" class="mt-4 hidden">
            <label for="">Specialty</label>
            <select name="specialty_id" class="border-2  w-full bg-gray-100 text-gray-900  p-3 rounded-lg focus:outline-none focus:shadow-outline">
                @foreach($specialty as $sp)
                <option value="{{$sp->id}}">{{$sp->specialty}}</option>
                @endforeach
            </select>
        </div>

        <div id="nss" class="mt-4 hidden">
            <x-input-label for="nss" :value="__('nss')" />
            <x-text-input class="block mt-1 w-full" type="text" name="nss" :value="old('nss')" autofocus autocomplete="nss" />
            <x-input-error :messages="$errors->get('nss')" class="mt-2" />
        </div>
        <script>
            document.getElementById('roleSelect').onchange = function() {
                var roleSelect = document.getElementById('roleSelect');
                var specialtySelectContainer = document.getElementById('specialtySelectContainer');
                var nss = document.getElementById('nss');
                if (roleSelect.value == 3) {
                    console.log("here");
                    specialtySelectContainer.classList.remove('hidden');
                    nss.classList.add('hidden');
                } else {
                    specialtySelectContainer.classList.add('hidden');
                    nss.classList.remove('hidden');

                }
            };
        </script>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-2 w-full" type="password" name="password" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>