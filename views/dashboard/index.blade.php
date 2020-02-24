<h1>
    dashboard
</h1>

@include('jigsaw-core::common.errors')

@foreach ($moduleList as $module)

    {{ link_to_route($module->routeName, $module->name, ['qwerty' => 'uiop']) }}

@endforeach

