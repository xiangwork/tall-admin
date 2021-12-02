<div class="z-0">
    <div x-data="{ tab: window.location.hash ? window.location.hash.substring(1) : '{{$headers[0]['key']}}' }">
        <!-- The tabs navigation -->
        <div class="flex justify-center items-center overflow-auto whitespace-nowrap">
            @foreach($headers as $header)

                @php
                    $classDisabled = "";
                    $disabledTabs = false;
                    if(isset($header['disabled'])){
                        $disabledTabs = $header['disabled'];
                    }
                @endphp

                @if($loop->first)
                    {{--start--}}
                    <button
                        id="tabBtn{{$header['key']}}"
                        {{$disabledTabs ? "disabled" : ""}}
                        :class="tab === '{{$header['key']}}'
                           ? 'disabled:cursor-not-allowed whitespace-nowrap flex flex-1 justify-center rounded-tl-xl border-gray-700 border-l-2 border-r-2 border-t-2 bg-blue-500 dark:bg-yellow-400 p-3 hover:bg-blue-600 text-gray-100 dark:text-gray-900'
                           : 'disabled:cursor-not-allowed whitespace-nowrap flex flex-1 justify-center rounded-tl-xl border-gray-700 border-r-2 border-r-2  border-l-2 border-t-2 p-3 hover:text-blue-500 text-gray-700 dark:text-gray-500'"
                       @click.prevent="tab = '{{$header['key']}}'; window.location.hash = '{{$header['key']}}'">
                        <span class="hidden md:block">{{$header['title']}}</span>
                        @isset($header['icon'])
                            <span class="block sm:hidden">{!! $header['icon'] !!}</span>
                        @endisset
                    </button>

                @elseif($loop->last)
                    {{--end--}}
                    <button
                        id="tabBtn{{$header['key']}}"
                        {{$disabledTabs ? "disabled" : ""}}
                        :class=" tab === '{{$header['key']}}'
                        ? 'disabled:cursor-not-allowed whitespace-nowrap flex flex-1 justify-center rounded-tr-xl border-gray-700 border-r-2 border-t-2 bg-blue-500 dark:bg-yellow-400  text-white p-3 hover:bg-blue-600 text-gray-100 dark:text-gray-900'
                        : 'disabled:cursor-not-allowed whitespace-nowrap flex flex-1 justify-center rounded-tr-xl border-gray-700 border-r-2  border-t-2 p-3 hover:text-blue-500 text-gray-700 dark:text-gray-500'"
                       @click.prevent="tab = '{{$header['key']}}'; window.location.hash = '{{$header['key']}}'">
                        <span class="hidden md:block">{{$header['title']}}</span>
                        @isset($header['icon'])
                            <span class="block sm:hidden">{!! $header['icon'] !!}</span>
                        @endisset
                    </button>
                @else
                    {{--center--}}
                    <button
                        id="tabBtn{{$header['key']}}"
                        {{$disabledTabs ? "disabled" : ""}}
                        :class=" tab === '{{$header['key']}}'
                        ? 'disabled:cursor-not-allowed flex flex-1 justify-center border-top border-r-2 border-t-2 border-gray-700 bg-blue-500 dark:bg-yellow-400 text-white p-3 hover:bg-blue-600 text-gray-100 dark:text-gray-900'
                        : 'disabled:cursor-not-allowed flex flex-1 justify-center border-top border-r-2 border-t-2 p-3 border-gray-700 hover:text-blue-500 text-gray-700 dark:text-gray-500'"
                       @click.prevent="tab = '{{$header['key']}}'; window.location.hash = '{{$header['key']}}'">
                        <span class="hidden md:block">{{$header['title']}}</span>
                        @isset($header['icon'])
                            <span class="block sm:hidden">{!! $header['icon'] !!}</span>
                        @endisset
                    </button>

                @endif
            @endforeach
        </div>

        <!-- The tabs content -->
        <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-b-xl border-2 border-gray-700 relative">
            @foreach($headers as $header)
                <div x-show="tab === '{{$header['key']}}'">
                    <h4 class="block sm:hidden heading text-center">{!! $header['title'] !!}</h4>
                    <div>
                        {{ ${$header["key"]} }}
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
