<?php

namespace jwwisniewski\Jigsaw\Core\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use jwwisniewski\Jigsaw\Core\Jigsaw;
use jwwisniewski\Jigsaw\Core\Module;

class DashboardController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Jigsaw $jigsaw)
    {
        /** @var Module[]|Collection $moduleList */
        $moduleList = $jigsaw->getRegisteredModules();

        return view('jigsaw-core::dashboard.index', compact('moduleList'));
    }
}
