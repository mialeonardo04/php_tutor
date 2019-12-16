<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['web']],function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    Route::get('/login',[
        'uses' => 'UserController@getLogin',
        'as' => 'login'
    ]);

    Route::post('/login',[
        'uses' => 'UserController@postSignIn',
        'as' => 'login'
    ]);

    Route::get('/logout',[
        'uses' => 'UserController@logout',
        'as' => 'logout'
    ]);


    Route::group(['middleware' => ['auth']],function (){
        Route::get('/siswa/dashboard',[
            'uses' => 'UserController@getDashboardSiswa',
            'as' => 'siswa.dashboard'
        ]);

        Route::get('/siswa/pretest',function (){
            return view('siswa.pretest');
        });

        Route::group(['middleware' => ['roles'],'roles' => ['pengajar']],function (){
            Route::get('/pengajar/dashboard',[
                'uses' => 'UserController@getDashboardPengajar',
                'as' => 'pengajar.dashboard'
            ]);
        });
    });
});
