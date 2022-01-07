<aside x-show.transition="showSidebar"
       x-transition.duration.100ms
       class="absolute min-h-screen lg:w-60 hidden lg:block
              overflow-y-scroll overflow-x-hidden
              bg-gradient-to-t from-blue-500 to-indigo-500 dark:from-gray-800 dark:to-gray-800"
       id="sidebar">
    <div class="p-6 flex">
        <a href="{{url('/home')}}"
           class="tracking-wide
                  w-full text-center
                  dark:text-yellow-400 text-gray-100 text-xl font-semibold font-display uppercase">
            {{ config('setting.app_name.value')?? config('app.name') }}</a>
    </div>

    @if(config('setting.app_logo.value'))
        <div class="p-6 flex justify-center">
            <img src="{{ asset('storage/settings/thumb_'.config('setting.app_logo.value')) }}" alt="app logo">
        </div>
    @endif

    <a href="{{url('logout')}}"
       class="absolute left-0 right-0 w-full md:w-2/3 upgrade-btn bottom-0
            bg-gray-800 dark:bg-yellow-400 rounded-md
            text-white dark:text-gray-900
            flex items-center justify-center py-4 mb-6 mx-auto">
        <i class="flex items-center text-lg fi-rr-sign-out mr-3"></i>
        <span class="text-sm font-bold">Sign Out</span>
    </a>

    <nav class="text-white text-base">
        <x-ui.navigation selector="sidebarnav"/>
    </nav>

</aside>
