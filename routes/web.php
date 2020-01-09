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
    Route::get('/register',[
        'uses' => 'UserController@getRegister',
        'as' => 'register'
    ]);
    Route::post('/login',[
        'uses' => 'UserController@postSignIn',
        'as' => 'login'
    ]);
    Route::post('/register',[
        'uses' => 'UserController@postSignUp',
        'as' => 'register'
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

        Route::get('/siswa/achievments',function (){
            echo $_COOKIE['id_student'];
        });

        Route::get('/siswa/pretest',[
            'uses' => 'StudentController@getPretestView',
            'as' => 'siswa.pretest'
        ]);

        Route::post('/submitpretest',[
            'uses' =>'StudentController@submitPretest',
            'as' => 'submitpretest'
        ]);

        Route::group(['middleware' => ['roles'],'roles' => ['pengajar']],function (){
            Route::get('/pengajar/dashboard',[
                'uses' => 'UserController@getDashboardPengajar',
                'as' => 'pengajar.dashboard'
            ]);
        });
    });
});
