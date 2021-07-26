@extends('layouts.main_navbar')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ url('projects/' . Session::get('currentProject')['id'] . '/articles') }}">
            <button type="button" class="btn btn-primary m-3">
                Back to project
            </button>
        </a>

        {!! Form::open(['url' => 'projects/' . Session::get('currentProject')['id'] . '/articles/' . $article->id . '/edit/content', 'method' => 'put']) !!}
        {{ Form::textarea('content', $article->content ?? '') }}
        {{ Form::submit('Save', [
            "class" => "btn btn-primary full-width mt-3"
        ]) }}
        {!! Form::close() !!}
    </div>

    <script src="https://cdn.tiny.cloud/1/vlmfp5kla0lanl0b5xthau2udem437ugidk43cca6rc1d1vo/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        const plugins = [
            'preview',
            'paste',
            'autolink',
            // 'autosave',
            // 'save',
            'directionality',
            'code',
            'visualblocks',
            'visualchars',
            'fullscreen',
            'image',
            'link',
            'media',
            'template',
            'codesample',
            'table',
            'charmap',
            'hr',
            'pagebreak',
            'nonbreaking',
            'anchor',
            'toc',
            'insertdatetime',
            'advlist',
            'lists',
            'wordcount',
            'imagetools',
            'textpattern',
            'noneditable',
            'help',
            'charmap',
            // 'quickbars',
            'emoticons'
        ]

        const events = [
            'beforeinput',
            'blur',
            'click',
            'compositionend',
            'compositionstart',
            'compositionupdate',
            'contextmenu',
            'copy',
            'cut',
            'dbclick',
            'drag',
            'dragdrop',
            'dragend',
            'draggesture',
            'dragover',
            'dragstart',
            'drop',
            'focus',
            'focusin',
            'focusout',
            'input',
            'keydown',
            'keypress',
            'keyup',
            'mousedown',
            'mouseenter',
            'mouseleave',
            'mousemove',
            'mouseover',
            'mouseup',
            'paste',
            'reset',
            'submit',
            'touchcancel',
            'touchend',
            'touchmove',
            'touchstart',
            'wheel'
        ]

        tinymce.init({
            selector: 'textarea',
            height: "480",
            setup: (editor) => {
                editor.on('init', async function(event) {
                    // setContentPage(contentPage)
                    // setBackgroundColorPage(backgroundColor)
                });
            },
            init_instance_callback: function(editor) {
                // editor.on('input ExecCommand ObjectResized SetContent', (e) => {
                //     document.getElementById('content-status').style.color = '#FFFFFF'
                //     document.getElementById('content-status').innerHTML = 'En cours ...'
                //     clearTimeout(savePageTimeOut)
                //     savePageTimeOut = setTimeout(function() {
                //         savePage({
                //             content: tinymce.get('tinymce').getContent()
                //         })
                //     }, 1000);
                // });
            },
            plugins: plugins.join(' '),
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true, // prevent popup
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [{
                    title: 'My page 1',
                    value: 'https://www.tiny.cloud'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_list: [{
                    title: 'My page 1',
                    value: 'https://www.tiny.cloud'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_class_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'Some class',
                    value: 'class-name'
                }
            ],
            importcss_append: true,
            file_picker_callback: function(callback, value, meta) {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', {
                        text: 'My text'
                    });
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', {
                        alt: 'My alt text'
                    });
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', {
                        source2: 'alt.ogg',
                        poster: 'https://www.google.com/logos/google.jpg'
                    });
                }
            },
            templates: [{
                    title: 'New Table',
                    description: 'creates a new table',
                    content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
                },
                {
                    title: 'Starting my story',
                    description: 'A cure for writers block',
                    content: 'Once upon a time...'
                },
                {
                    title: 'New list with dates',
                    description: 'New List with dates',
                    content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
                }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image imagetools table',
            skin: 'oxide-dark',
            content_css: 'dark',
            content_style: 'body { font-family:serif; color: white }'
        })
    </script>


@endsection
