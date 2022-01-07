<aside x-show.transition="showSidebar"
       x-transition.duration.100ms
       class="relative min-h-screen h-full w-72 hidden lg:block
              bg-gradient-to-t from-blue-500 to-indigo-500 dark:from-gray-600 dark:to-gray-800"
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

    <nav class="text-white text-base">
        <x-ui.navigation selector="sidebarnav"/>
    </nav>

    <a href="{{url('logout')}}"
       class="btn-logout absolute w-full upgrade-btn bottom-0
            bg-gradient-to-br from-indigo-700 to-blue-500 dark:from-yellow-400 dark:to-yellow-500
            text-white dark:text-gray-900
            flex items-center justify-center py-4">
        <i class="flex items-center text-lg fi-rr-sign-out mr-3"></i>
        <span class="text-sm font-bold">Sign Out</span>
    </a>
</aside>
