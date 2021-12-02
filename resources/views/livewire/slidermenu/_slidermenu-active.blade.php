<div wire:ignore
     wire:key="slider-menu-active-{{$row['slider_id']}}"
    x-data="{ toggle: '{{$row['slider_active']}}' }"
     x-init="$watch('toggle', value => $wire.emitTo('slider-menu.slider-menu-page','watchSliderActive', value,{{$row}}))">
    <div class="relative rounded-full w-12 h-6 transition duration-200 ease-linear"
         :class="[toggle === '1' ? 'dark:bg-yellow-400 bg-blue-400' : 'bg-gray-400']">
        <label for="toggle"
               class="absolute left-0 bg-white border-2 mb-2 w-6 h-6 rounded-full transition transform duration-100 ease-linear cursor-pointer"
               :class="[toggle === '1' ? 'translate-x-full dark:bg-gray-100 dark:border-white border-blue-400' : 'translate-x-0 border-gray-400']"></label>
        <input type="checkbox" id="toggle" name="toggle"
               class="hidden w-full h-full active:outline-none focus:outline-none"
               @click="toggle === '0' ? toggle = '1' : toggle = '0'">
    </div>
</div>
