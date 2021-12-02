<x-guest-layout>
    <div class="min-h-screen min-w-full dark:bg-gray-800 bg-gray-200 flex justify-center items-center relative">
        <nav class="absolute top-0 right-0">
            <div class="container p-5">
                <a href="{{url('/login')}}" class="text-gray-700 dark:text-gray-300 font-bold">LOGIN</a>
            </div>
        </nav>
        <div>
            <h1 class="text-red-500 lg:text-8xl text-6xl font-bold">{{config('app.name')}}</h1>
        </div>
    </div>
</x-guest-layout>
