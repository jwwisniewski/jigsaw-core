<?php
Route::middleware('web')
    ->namespace('jwwisniewski\Jigsaw\Core\Http\Controllers')
    ->group(function () {
        Route::prefix('_admin')->group(function () {
            Route::get('/index', array('as' => 'dashboard.index', 'uses' => 'DashboardController@index'));

            Route::prefix('instance')->group(function (){
                Route::get('index', array('as' => 'instance.index', 'uses' => 'InstanceController@index'));
                Route::get('create', array('as' => 'instance.create', 'uses' => 'InstanceController@create'));
                Route::post('store', array('as' => 'instance.store', 'uses' => 'InstanceController@store'));
                Route::get('edit/{instance}', array('as' => 'instance.edit', 'uses' => 'InstanceController@edit'));
                Route::post('update/{instance}', array('as' => 'instance.update', 'uses' => 'InstanceController@update'));
                Route::get('destroy/{instance}', array('as' => 'instance.destroy', 'uses' => 'InstanceController@destroy'));
            });
        });
    });


