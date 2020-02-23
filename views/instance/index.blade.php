<h1>
    instances
</h1>

<p>
    {!! link_to_route('instance.create', __('ui.create'), ['returnPath' => base64_encode(request()->fullUrl())]) !!}
</p>

@foreach ($instanceList as $instance)
     {{ $instance->id }}, {{ $instance->url }}, {{ $instance->module }}
     - {!! link_to_route('instance.edit', __('ui.edit'), [$instance->id, 'returnPath' => base64_encode(request()->fullUrl())]) !!}
     - {!! link_to_route('instance.destroy', __('ui.destroy'), [$instance->id, 'returnPath' => base64_encode(request()->fullUrl())]) !!}
    <br>
@endforeach

