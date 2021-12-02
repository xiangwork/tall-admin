<div x-data="setupEditor('<p>Hello World! :-)</p>')" x-init="() => init($refs.element)">

    <template x-if="editor">
        <div class="menu">
            <button
                @click="editor.chain().toggleHeading({ level: 1 }).focus().run()"
                :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }"
            >
                H1
            </button>
            <button
                @click="editor.chain().toggleBold().focus().run()"
                :class="{ 'is-active': editor.isActive('bold') }"
            >
                Bold
            </button>
            <button
                @click="editor.chain().toggleItalic().focus().run()"
                :class="{ 'is-active': editor.isActive('italic') }"
            >
                Italic
            </button>
        </div>
    </template>

    <div x-ref="element"></div>
</div>

@push("scripts")
    <script data-turbolinks-eval="false"  data-turbo-eval="false"
        type="module" src="{{asset('js/editor.js')}}"></script>
@endpush
