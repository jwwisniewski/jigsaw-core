<?php

namespace jwwisniewski\Jigsaw\Core\Http\Controllers;

use jwwisniewski\Jigsaw\Core\Jigsaw;

class DashboardController extends Controller
{
    public function index(Jigsaw $jigsaw)
    {
        $moduleList = $jigsaw->getRegisteredModules();

        return view('jigsaw-core::dashboard.index', compact('moduleList'));

    }
}
