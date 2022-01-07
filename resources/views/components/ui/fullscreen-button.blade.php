<div class="cursor-pointer"
     x-data="{fullscreen:localStorage.getItem('full-screen')}"
     x-init="$watch('fullscreen',(value)=>{
                localStorage.setItem('full-screen', value);
                if (value === true){
                    let elem = document.querySelector('body');
                    elem.requestFullscreen();
                }else{
                    document.exitFullscreen();
                }
            })"
     x-on:click="fullscreen = !fullscreen">
    <span class="fi-rr-expand text-3xl mx-1 mr-3 flex items-center"></span>
</div>
