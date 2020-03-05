<?php

Route::middleware('web')
    ->namespace('jwwisniewski\Jigsaw\Core\Http\Controllers')
    ->group(function () {
        Route::get('{locale}/{path}', 'ClientController@display')
            ->where('locale', '([a-z]){2}')
            ->where('path', '^(?!_admin).*$');

        Route::prefix('_admin')->group(function () {
            Route::get('/', function () {
                return redirect()->route('dashboard.index');
            });
            Route::get('/index', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);

            Route::prefix('instance')->group(function () {
                Route::get('index', ['as' => 'instance.index', 'uses' => 'InstanceController@index']);
                Route::get('create', ['as' => 'instance.create', 'uses' => 'InstanceController@create']);
                Route::post('store', ['as' => 'instance.store', 'uses' => 'InstanceController@store']);
                Route::get('edit/{instance}', ['as' => 'instance.edit', 'uses' => 'InstanceController@edit']);
                Route::post('update/{instance}', ['as' => 'instance.update', 'uses' => 'InstanceController@update']);
                Route::get('destroy/{instance}', ['as' => 'instance.destroy', 'uses' => 'InstanceController@destroy']);
            });
        });
    });
