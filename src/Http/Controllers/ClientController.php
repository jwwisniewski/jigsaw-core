<?php

declare(strict_types=1);

namespace jwwisniewski\Jigsaw\Core\Http\Controllers;

use jwwisniewski\Jigsaw\Core\Jigsaw;

class ClientController
{
    public function display(string $locale, string $path, Jigsaw $jigsaw)
    {
        if (! array_key_exists($locale, config('jigsaw.availableClientLocales'))) {
            abort(404);
        }

        \App::setLocale($locale);

        $pathSegments = explode('/', $path);

        return app()->call(\jwwisniewski\Jigsaw\Subpage\Controllers\ClientController::class, [$locale, $pathSegments[0]], 'full');
    }
}
