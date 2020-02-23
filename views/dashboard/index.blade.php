<h1>
    dashboard
</h1>

@include('jigsaw-core::common.errors')

@foreach ($moduleList as $module)

    {{ $module }} <br>
@endforeach

