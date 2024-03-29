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
    Route::get('/getting_started',[
        'uses' =>'UserController@getDocumentation',
        'as' => 'getting.started',
    ]);
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

    Route::post('/sendemail',[
        'uses' => 'MailController@sendemail',
        'as' => 'sendemail'
    ]);

    Route::get('reset/{email}/{id}', function ($email,$id) {
        return view('emails.resetpass',[
            'dataEmail' => base64_decode($email),
            'id'=>base64_decode($id)
        ]);
    });

    Route::post('/resetPassword',[
        'uses' => 'MailController@resetPassword',
        'as' => 'resetPassword'
    ]);

    Route::group(['middleware' => ['auth']],function (){
        Route::get('/profile/{id}',[
            'uses' => 'UserController@getProfile',
        ]);
        Route::post('/update/{id}',[
            'uses' => 'UserController@updateProfile',
        ]);

        Route::group(['middleware' => ['roles'],'roles' => ['siswa']],function (){
            Route::get('/siswa/getting_started',[
                'uses' =>'StudentController@getDocumentation',
                'as' => 'siswa.getting.started',
            ]);
            Route::get('/siswa/dashboard',[
                'uses' => 'UserController@getDashboardSiswa',
                'as' => 'siswa.dashboard'
            ]);

            Route::get('/siswa/achievements',[
                'uses' => 'StudentController@achievementsHome',
                'as' => 'siswa.achievements'
            ]);

            Route::post('/siswa/units/{id_unit}/{total_course}',[
                'uses' => 'StudentController@selectUnit',
            ]);
            Route::get('/siswa/units',[
                'uses' => 'StudentController@coursesUnitHome',
                'as' => 'siswa.units'
            ]);

            Route::get('/siswa/courses/{id_unit}/{id_course}/',[
                'uses' => 'StudentController@getCourse',
                'as' => 'siswa.course'
            ]);

            Route::get('/siswa/pretest',[
                'uses' => 'StudentController@getPretestView',
                'as' => 'siswa.pretest'
            ]);

            Route::post('/submitpretest',[
                'uses' =>'StudentController@submitPretest',
                'as' => 'submitpretest'
            ]);

            Route::post('/submitexercise',[
                'uses' => 'StudentController@submitExerciseCourse',
                'as' => 'submitexercise'
            ]);

            Route::post('/submitExCode',[
                'uses' => 'StudentController@submitExerciseCode',
                'as' => 'submitExCode',
            ]);

            Route::post('/submitTx',[
                'uses' => 'StudentController@submitExerciseTeori',
                'as'=> 'submitTx',
            ]);
            Route::get('/siswa/getExam',[
                'uses' => 'StudentController@getExamTest',
                'as' => 'siswa.getexam'
            ]);

            Route::post('/submitposttestsecone',[
                'uses' => 'StudentController@submitTestSecOne',
                'as' => 'submitposttestsecone',
            ]);

            Route::post('/siswa/getExam',[
                'uses' => 'StudentController@goToSectionTwo',
                'as' => 'examch2',
            ]);

            Route::post('/siswa/postExam',[
                'uses' => 'StudentController@submitSectionTwo',
                'as' => 'postExam2',
            ]);

            Route::post('/siswa/resetExam',[
                'uses' => 'StudentController@resetExam',
                'as' => 'resetExam',
            ]);

        });


        Route::group(['middleware' => ['roles'],'roles' => ['pengajar']],function (){
            Route::get('/pengajar/dashboard',[
                'uses' => 'UserController@getDashboardPengajar',
                'as' => 'pengajar.dashboard'
            ]);
            Route::post('/admin/assign-verify',[
                'uses' => 'UserController@updateVerifyUser',
                'as' => 'admin.assign'
            ]);
            Route::get('/pengajar/datasiswa',[
                'uses' => 'UserController@getDataSiswa',
                'as' => 'pengajar.datasiswa'
            ]);
            Route::get('/pengajar/datasiswa/{id_user}/{id_student}',[
                'uses' => 'UserController@getDetailDataSiswa',
                'as' => 'pengajar.detail.datasiswa'
            ]);
            Route::get('/pengajar/unitrecords',[
                'uses' => 'UserController@getUnitView',
                'as'=> 'pengajar.unitrecords'
            ]);
            Route::get('/pengajar/unitrecords/{id_unit}',[
                'uses' => 'UserController@getDetailUnitRecord',
                'as' => 'pengajar.unitrecords.detail'
            ]);
            Route::get('/pengajar/detailreport/{id_report}',[
                'uses' => 'UserController@getDetailReportSelect',
                'as' => 'pengajar.detail.report.select'
            ]);
        });
    });
});
