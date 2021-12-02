<div class="rounded-full p-3 h-12 w-12 flex items-center justify-center">
    <button @click="darkMode = !darkMode">
        <img x-transition.duration.100ms x-show.transition="darkMode" src="{{ asset('images/sun.png') }}"
             alt="moon">
        <img x-transition.duration.100ms x-show.transition="!darkMode" src="{{ asset('images/moon.png') }}"
             alt="sun">
    </button>
</div>
