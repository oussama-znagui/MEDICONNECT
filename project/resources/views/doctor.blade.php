<x-app-layout>


    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    <section class="pt-16 bg-blueGray-50">
        <div class="w-full px-4 mx-auto">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
                <div class="px-6">
                    <div class="flex flex-wrap justify-center ">
                        <div class="w-full px-4 flex justify-center">
                            <div class="relative">
                                <img alt="..." src="../assets/img/doctor.png" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                            </div>
                        </div>
                        <div class="w-full px-4 text-center mt-20">
                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                <div class="mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                        22
                                    </span>
                                    <span class="text-sm text-blueGray-400">Friends</span>
                                </div>
                                <div class="mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                        10
                                    </span>
                                    <span class="text-sm text-blueGray-400">Photos</span>
                                </div>
                                <div class="lg:mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                        89
                                    </span>
                                    <span class="text-sm text-blueGray-400">Comments</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="bg-gray-100 py-5 mt-4 flex gap-4 items-center justify-around w-11/12 rounded-2xl m-auto">





                        <div class="mt-2 text-center w-56">
                            <h5 class="font-bold">
                                Nom complet
                            </h5>
                            <p>{{$doctor->user->name}}</p>

                        </div>
                        <div class="mt-2 text-center w-56">
                            <h5 class="font-bold">
                                Spécialité
                            </h5>
                            <p>{{$doctor->specialty->specialty}}</p>
                        </div>
                        <div class="mt-2 text-center w-56">
                            <h5 class="font-bold">
                                E-mail
                            </h5>
                            <p>{{$doctor->user->email}}</p>
                        </div>
                        <div class="mt-2 text-center w-56">
                            <h5 class="font-bold">
                                Date d'integration
                            </h5>
                            <p>{{$doctor->user->created_at}}</p>
                        </div>




                    </div>
                    <div class="my-5 w-3/4 m-auto">
                        <form action="/appointment" method="post" class="w-full mx-auto flex justify-around items-center">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                            <select name="shift" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>choisissez un shift</option>
                                <option value="8">8H -> 10H</option>
                                <option value="10">10H -> 12H</option>
                                <option value="14">14H -> 16H</option>
                                <option value="16">16H -> 18H</option>
                            </select>
                            <input type="text" class="hidden" value="{{$doctor->id}}" name="doctor_id" id="">
                            <button class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center"> Prendre un rendez-vous</button>
                        </form>

                    </div>
                    <div class="w-3/4 mx-auto px-4 my-10 border-solid border-2 border-black rounded-2xl p-5">
                        <h1 class="text-center mb-4 text-4xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                            Note globale : <span> {{(int)$note}}</span>
                        </h1>




                    </div>
                    <div class=" w-3/4 mx-auto px-4 my-10 border-solid border-2 border-black rounded-2xl p-5">
                        <form action="/rating" method="post" class="w-3/4 m-auto flex justify-around items-center">
                            @csrf
                            <div>

                                <input name="rating" type="radio" value="0">
                                <label for="">Mauvais service</label>
                            </div>
                            <div>

                                <input name="rating" type="radio" value="5">
                                <label for="">Moyen</label>
                            </div>
                            <div>

                                <input name="rating" type="radio" value="7">
                                <label for="">Bien</label>
                            </div>
                            <div>

                                <input name="rating" type="radio" value="10">
                                <label for="">Tres bien</label>
                            </div>

                            <input type="text" class="hidden" value="{{$doctor->id}}" name="doctor_id" id="">


                            <input type="submit" value="Envoyer" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 ">


                    </div>




                    </form>

                </div>

                <div class="w-3/4 mx-auto px-4 my-4 border-solid border-2 border-black rounded-2xl pt-5">
                    <div class=" mb-6">
                        <h2 class="text-center text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Commenter </h2>
                    </div>
                    <form class="mb-6" method="post" action="/addComment">
                        @csrf
                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" name="comment" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Write a comment..." required></textarea>
                        </div>

                        <input type="text" class="hidden" value="{{$doctor->id}}" name="doctor_id" id="">


                        <button type="submit" class="inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Post comment
                        </button>
                    </form>


                    @foreach($doctor->comments as $comment)

                    <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img class="mr-2 w-6 h-6 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Michael Gough">{{$comment->user->name}}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{$comment->created_at}}</time></p>
                            </div>



                        </footer>


                        <p class="text-gray-500 dark:text-gray-400">{{$comment->comment}}</p>
                        <div class="flex items-center mt-4 space-x-4">
                            <button type="button" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                </svg>
                                Reply
                            </button>
                        </div>
                    </article>
                    @endforeach



                </div>

            </div>
        </div>
        </div>
        <footer class="relative  pt-8 pb-6 mt-8">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap items-center md:justify-between justify-center">
                    <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                        <div class="text-sm text-blueGray-500 font-semibold py-1">
                            Made with <a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> Creative Tim</a>.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>
</x-app-layout>