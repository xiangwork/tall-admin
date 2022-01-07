<div wire:ignore.self x-transition.duration.500ms>
    <ul id="{{$selector}}" class="font-body text-sm capitalize">
        <li class="nav-item {{session('active') == 'home' ? 'nav-active' : ''}}">
            <a href="{{route('home')}}" aria-expanded="false" class="text-sm">
                <div class="flex items-center">
                    <i class="flex items-center fi-rr-stats text-lg"></i>
                    <span class="ml-3"> Dashboard </span>
                </div>
            </a>
        </li>

        <li class="nav-item" x-data="{show:{{ session('expanded') == 'admin' ? 'true' : 'false'}} }">
            <a href="javascript:void(0)" x-on:click="show = !show"
               class="text-sm flex justify-between items-center">
                <div class="flex items-center">
                    <i class="text-xl flex items-center fi-rr-settings"></i>
                    <span class="ml-3"> Admin </span>
                </div>
                <span :class="{'transform rotate-90 duration-150' : show}"
                      class="flex items-center fi-rr-angle-right text-gray-400 dark:text-gray-300 mr-3"></span>
            </a>
            <ul x-show="show"
                x-transition.duration.200ms
                class="pt-2 pl-2 overflow-x-hidden
                       {{session('expanded') == 'admin' ? 'mm-show' : 'mm-collapse'}}">
                @if(auth()->user()->role == 'super-admin')
                    <li class="nav-item {{ session('active') == 'user' ? 'nav-active' : ''}} ml-5">
                        <a href="{{route('user')}}" aria-expanded="false" class="text-sm">
                            User
                        </a>
                    </li>
                @endif
                <li class="nav-item {{session('active') == 'profile' ? 'nav-active' : ''}} ml-5">
                    <a href="{{route('profile')}}" aria-expanded="false" class="text-sm">
                        Profile
                    </a>
                </li>
                <li class="nav-item {{session('active') == 'setting' ? 'nav-active' : ''}} ml-5">
                    <a href="{{route('setting')}}" aria-expanded="false" class="text-sm">
                        Setting
                    </a>
                </li>
                <li class="nav-item {{session('active') == 'slidermenu' ? 'nav-active' : ''}} ml-5">
                    <a href="{{route('slidermenu')}}" aria-expanded="false" class="text-sm">
                        Slider
                    </a>
                </li>
            </ul>
        </li>

        @if(auth()->user()->role == 'super-admin')
            <li class="nav-item"
                x-on:click="show = !show"
                x-data="{show:{{ session('expanded') == 'master' ? 'true' : 'false'}} }">
                <a href="javascript:void(0)" class="text-sm flex justify-between items-center">
                    <div class="flex items-center">
                        <i class="text-xl flex items-center fi-rr-tool-crop"></i>
                        <span class="ml-3"> Utilities </span>
                    </div>
                    <span :class="{'transform rotate-90 duration-150' : show}"
                        class="flex items-center fi-rr-angle-right text-gray-400 dark:text-gray-300 mr-3"></span>
                </a>
                <ul x-show="show"
                    x-transition.duration.200ms
                    class="pt-2 pl-2 {{session('expanded') == 'utilities' ? 'mm-show' : 'mm-collapse'}}">
                    <li class="nav-item {{session('active') == 'docs' ? 'nav-active' : ''}} ml-5">
                        <a target="_blank" href="https://1drv.ms/b/s!Agl0opIdLuH8mzpNPAUaNIZ1AFhY?e=cXh4M6"
                           aria-expanded="false" class="text-sm">
                            Docs
                        </a>
                    </li>
                    <li class="nav-item {{session('active') == 'tinker' ? 'nav-active' : ''}} ml-5">
                        <a target="_blank" href="{{url('tinker')}}" aria-expanded="false" class="text-sm">
                            Tinker
                        </a>
                    </li>
                    <li class="nav-item {{session('active') == 'routes' ? 'nav-active' : ''}} ml-5">
                        <a target="_blank" href="{{url('routes')}}" aria-expanded="false" class="text-sm">
                            Routes
                        </a>
                    </li>
                    <li class="nav-item {{session('active') == 'schematics' ? 'nav-active' : ''}} ml-5">
                        <a target="_blank" href="{{url('schematics')}}" aria-expanded="false" class="text-sm">
                            Schematics
                        </a>
                    </li>
                    <li class="nav-item {{session('active') == 'crud' ? 'nav-active' : ''}} ml-5">
                        <a target="_blank" href="{{url('crud')}}" aria-expanded="false" class="text-sm">
                            CRUD Generator
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</div>

