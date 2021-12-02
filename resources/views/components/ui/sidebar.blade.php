<aside x-show.transition="showSidebar" x-transition.duration.100ms class="relative dark:bg-gray-800 bg-blue-600 h-screen w-72 hidden lg:block" id="sidebar">
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
        <x-ui.navigation selector="sidebarnav"></x-ui.navigation>
    </nav>
    <a href="{{url('logout')}}"
       class="btn-logout absolute w-full upgrade-btn bottom-0
            bg-blue-700 dark:bg-yellow-400 text-white dark:text-gray-900
            flex items-center justify-center py-4">
        <i class="flex items-center text-lg fi-rr-sign-out mr-3"></i>
        <span class="text-sm font-bold">Sign Out</span>
    </a>
</aside>
