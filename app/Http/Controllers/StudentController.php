<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Course;
use App\Unit;
use App\Report;
use App\StudentPretestAnswer;

use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getPretestView(){
        $siswa = Student::all();

        $status_progress = 0;
        $status_pretest = 0;
        foreach ($siswa as $murid) {
            if ($murid->id_user == Auth::user()->id) {
                $status_progress = $murid->progress;
                $status_pretest = $murid->progress_pretest_unit;
            }
        }
        return view('siswa.pretest',[
            'uid'=> Auth::user()->id,
            'statuspretest'=>$status_pretest,
            'statusprogress'=>$status_progress
        ]);
    }

    public function submitPretest(){
//        $courses = Course::all();
        $nilaipretest = request('scorepretest');
        $uid = request('uid');
        $submit = request('submit');
        $unit_id = request('unitID');
        $id_student = Student::where('id_user',$uid)->first()->id;
//      echo $id_student;

//        $scorepretest = $nilaipretest * 10;
//        if ($scorepretest >= 30 && $scorepretest <= 40){
//            $unit = 4;
//        } elseif ($scorepretest > 40 && $scorepretest <= 60){
//            $unit = 5;
//        } elseif ($scorepretest > 60 && $scorepretest < 90){
//            $unit = 6;
//        } elseif ($scorepretest >= 90){
//            $unit = 7;
//        } else {
//            $unit = 1;
//        }
//        $progress =
//
        if (isset($submit)){
            $student_answer = new StudentPretestAnswer();
            $student_answer->id_student = $id_student;
            $student_answer->id_unit = $unit_id;
            $student_answer->jumlah_benar = $nilaipretest;
            $student_answer->save();
            Student::where('id_user', '=',$uid)
                ->limit(1)
                ->update([
                    'progress_pretest_unit' => $unit_id+1,
                ]);
            $progress = request('progress');
            if (isset($progress)){
                Student::where('id_user','=',$uid)
                    ->limit(1)
                    ->update([
                        'progress' => $progress,
                    ]);
            }
        }
//
        return redirect()->route('siswa.pretest');
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

    public function achievementsHome(){
        $siswa = Student::all();
        $status_progress = 0;
        $id_student = 0;

        foreach ($siswa as $murid){
            if ($murid->id_user == Auth::user()->id){
                $status_progress = $murid->progress;
                $id_student = $murid->id;
            }
        }

        return view('siswa.achievements',[
            'statusprogress'=>$status_progress,
            'idstudent' => $id_student
        ]);
    }

    public function coursesHome(){
        $siswa = Student::all();
        $status_progress = 0;
        $id_student = 0;

        foreach ($siswa as $murid){
            if ($murid->id_user == Auth::user()->id){
                $status_progress = $murid->progress;
                $id_student = $murid->id;
            }
        }

        $nilaiPretest = StudentPretestAnswer::where('id_student',$id_student);
        $courses = Course::all();

        return view('siswa.courses',[
            'statusprogress'=>$status_progress,
            'idstudent' => $id_student
        ]);
    }
}
