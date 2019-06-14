<?php


Route::get('/', function () {return view('welcome');});

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('/users')->group(function () {
        Route::get('/','UserController@index');
        Route::get('/delete/{id}','UserController@delete_user');
        Route::get('/add','UserController@add');
        Route::post('/save','UserController@save');
        Route::get('/edit/{id}','UserController@edit_user');
        Route::post('/update','UserController@update');
        Route::get('/add_to_project/{id}','UserController@add_to_project');
        Route::post('/add_user_to_project','UserController@add_user_to_project');
    });

    Route::prefix('/projects')->group(function () {
        Route::get('/','ProjectController@index');
        Route::get('/delete/{id}','ProjectController@delete_project');
        Route::get('/add','ProjectController@add');
        Route::post('/save','ProjectController@save');
        Route::get('/cancel/{id}','ProjectController@cancel');
        Route::get('/make_done/{id}','ProjectController@make_done');
        Route::get('/edit/{id}','ProjectController@edit');
        Route::post('/update','ProjectController@update');

    });

});
