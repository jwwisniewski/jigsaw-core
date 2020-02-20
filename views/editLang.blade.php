{!! Form::open(['url' => request()->path(), 'method' => 'get']) !!}
    {!! Form::select('editLang', config('jigsaw.availableClientLocales'), request()->get('editLang', config('jigsaw.defaultClientLocale')), ['onchange' => 'this.form.submit();', 'disabled' => $disabled ?? false]) !!}
    {!! Form::hidden('returnPath', request()->get('returnPath')) !!}
{!! Form::close() !!}
