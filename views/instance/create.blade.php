<html>
<head>
</head>
<body>

<h1>
    create
</h1>

@include('jigsaw-core::common.errors')
@include('jigsaw-core::common.editLang', ['disabled' => true])

{!! Form::open(['route' => ['instance.store']]) !!}

    module - {!! Form::select('module', $modules) !!} <br>
    title - {!! Form::text('title') !!} <br>
    url - {!! Form::text('url') !!} <br>
    kw - {!! Form::text('keywords') !!} <br>
    descr - {!! Form::textarea('description') !!} <br>

    {!! Form::submit(__('ui.saveAndContinue'), ['name' => jwwisniewski\Jigsaw\Core\Enum\SaveMode::SAVE_AND_CONTINUE]) !!}
    {!! Form::submit(__('ui.saveAndReturn'), ['name' => jwwisniewski\Jigsaw\Core\Enum\SaveMode::SAVE_AND_RETURN]) !!}
    {!! Form::button(__('ui.cancel'), ['onclick' => new Illuminate\Support\HtmlString("window.location.href='" . base64_decode(request()->get('returnPath')) . "'")]) !!}

    {!! Form::hidden('editLang', request()->get('editLang', config('jigsaw.defaultClientLocale'))) !!}
    {!! Form::hidden('returnPath', request()->get('returnPath')) !!}

{!! Form::close() !!}


</body>
</html>