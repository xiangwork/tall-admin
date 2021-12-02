<script data-turbolinks-eval="false"  data-turbo-eval="false">
    @php
        isset($selector) ? $name = $selector : $name = 'modal_form'
    @endphp
    var {{$name}} = new bootstrap.Modal(document.querySelector("#{{$name}}"));
    window.Livewire.on('show_{{$name}}', () => {
        {{$name}}.show();
    });
    window.Livewire.on('hide_{{$name}}',() => {
        {{$name}}.hide();
    });
</script>
