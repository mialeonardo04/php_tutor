<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Course;
use App\Unit;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function submitPretest(){
        $courses = Course::all();
        $nilaipretest = request('scorepretest');
        $uid = request('uid');
        $submit = request('submit');

        $scorepretest = $nilaipretest * 10;
        if ($scorepretest >= 30 && $scorepretest <= 40){
            $unit = 4;
        } elseif ($scorepretest > 40 && $scorepretest <= 60){
            $unit = 5;
        } elseif ($scorepretest > 60 && $scorepretest < 90){
            $unit = 6;
        } elseif ($scorepretest >= 90){
            $unit = 7;
        } else {
            $unit = 1;
        }
//        $progress =

        if (isset($submit)){
            Student::where('id_user', '=',$uid)
                ->limit(1)
                ->update([
                    'progress' => $unit,
                    'nilai_siswa' => $scorepretest,
                    'unit_start' => $unit
                ]);
        }

        return redirect()->route('siswa.dashboard')->with([
            'courses'=>$courses,
            'statuspretest'=>1,
            'scorepretest' =>$scorepretest
        ]);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
