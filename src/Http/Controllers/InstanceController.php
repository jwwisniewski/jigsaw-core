<?php

namespace jwwisniewski\Jigsaw\Core\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use jwwisniewski\Jigsaw\Core\Enum\SaveMode;
use jwwisniewski\Jigsaw\Core\Http\Requests\StoreInstance;
use jwwisniewski\Jigsaw\Core\Http\Requests\UpdateInstance;
use jwwisniewski\Jigsaw\Core\Instance;
use jwwisniewski\Jigsaw\Core\Jigsaw;

class InstanceController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $instanceList = Instance::all();

        return view('jigsaw-core::instance.index', ['instanceList' => $instanceList]);
    }

    public function create(Jigsaw $jigsaw)
    {
        $modules = $jigsaw->getInstatniableModules();

        return view('jigsaw-core::instance.create', compact('modules'));
    }

    public function store(StoreInstance $request)
    {
        $validated = $request->validated();
        if ($validated['url'] === null) {
            $validated['url'] = $validated['title'];
        }
        $validated['url'] = Str::slug($validated['url']);

        $instance = new Instance();
        $instance->fill($validated);
        $instance->save();

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->to(base64_decode($request->get('returnPath')));
        }

        return redirect()->route('jigsaw-core::instance.edit', [
            $instance->id,
            'editLang' => $request->get('editLang'),
            'returnPath' => $request->get('returnPath'),
        ]);
    }

    public function edit(Instance $instance, Jigsaw $jigsaw)
    {
        $modules = $jigsaw->getInstatniableModules();

        return view('jigsaw-core::instance.edit', compact('instance', 'modules'));
    }

    public function update(UpdateInstance $request, Instance $instance)
    {
        $validated = $request->validated();
        if ($validated['url'] === null) {
            $validated['url'] = $validated['title'];
        }
        $validated['url'] = Str::slug($validated['url'], '-', $request->get('editLang'));

        $instance->update($validated);

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->to(base64_decode($request->get('returnPath')));
        }

        return redirect()->route('jigsaw-core::instance.edit', [
            $instance->id,
            'editLang' => $request->get('editLang'),
            'returnPath' => $request->get('returnPath'),
        ]);
    }

    public function destroy(Instance $instance, Request $request)
    {
        $instance->delete();

        return redirect()->to(base64_decode($request->get('returnPath')));
    }
}
