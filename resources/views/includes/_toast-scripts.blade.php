<script data-turbolinks-eval="false" data-turbo-eval="false">
    Livewire.on('showToast', (res) => {
        new Noty({
            layout: 'bottomRight',
            text: res.message,
            theme: 'relax',
            type: res.type,
            timeout: 1300,
        }).on('afterClose', function() {
            if(res.reload){
                window.location.reload();
            }
        }).show();
    });

    window.addEventListener('showToast', (evt) => {
        var res = evt.detail;
        new Noty({
            text: res.message,
            theme: 'relax',
            type: res.type,
            timeout: 1300,
        }).on('afterClose', function() {
            if(res.reload){
                window.location.reload();
            }
        }).show();
    });
</script>
