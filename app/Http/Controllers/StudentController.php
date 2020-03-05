<?php

namespace App\Http\Controllers;

use App\CourseDetail;
use App\StudentFinalExamRecord;
use Illuminate\Http\Request;

use App\Student;
use App\Course;
use App\Unit;
use App\Report;
use App\StudentPretestAnswer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getPretestView(){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else{
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
    }

    public function submitPretest(){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else{
            $nilaipretest = base64_decode(request('scorepretest'));
            $uid = base64_decode(request('uid'));
            $submit = request('submit');
            $unit_id = request('unitID');
            $id_student = Student::where('id_user',$uid)->first()->id;

            if (isset($submit)){
//            echo $nilaipretest;
                if (StudentPretestAnswer::where(['id_student' => $id_student, 'id_unit' =>$unit_id])->count() > 0){
                    StudentPretestAnswer::where(['id_student' => $id_student, 'id_unit' =>$unit_id])->delete();
                }

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
                    $unit_start = 0;
                    $avg_pretest = $student_answer::where('id_student',$id_student)->avg('jumlah_benar');
                    $std_ptest = StudentPretestAnswer::where('id_student',$id_student)->get();
                    foreach ($std_ptest as $pt){
                        if ($pt->jumlah_benar<3){
                            $unit_start ++;
                        }
                    }

                    if ($unit_start > 0){
                        Student::where('id_user','=',$uid)
                            ->limit(1)
                            ->update([
                                'progress' => $progress,
                                'avg_pretest' => $avg_pretest*20,
                                'unit_start' => $unit_start,
                            ]);
                    } else {
                        Student::where('id_user','=',$uid)
                            ->limit(1)
                            ->update([
                                'progress' => $progress,
                                'avg_pretest' => $avg_pretest*20,
                                'avg_exercise' => $avg_pretest*20,
                                'unit_start' => $unit_start,
                            ]);
                    }
                }
            }
            return redirect()->route('siswa.pretest');
        }
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
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else{
            $siswa = Student::all();
            $status_progress = 0;
            $id_student = 0;
            $unittaken = 0;
            $avg_pretest = 0;
            $avg_course = 0;
            $nilaifinal =0;

            foreach ($siswa as $murid){
                if ($murid->id_user == Auth::user()->id){
                    $status_progress = $murid->progress;
                    $id_student = $murid->id;
                    $unittaken = $murid->unit_start;
                    $avg_pretest = $murid->avg_pretest;
                    $avg_course = $murid->avg_exercise;
                    $nilaifinal = $murid->nilai_final;
                }
            }

            return view('siswa.achievements',[
                'statusprogress'=>$status_progress,
                'idstudent' => $id_student,
                'unittaken'=> $unittaken,
                'pretest' => $avg_pretest,
                'course' => $avg_course,
                'nilaifinal' => $nilaifinal,
            ]);
        }
    }

    public function coursesUnitHome(){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else{
            $siswa = Student::all();
            $status_progress = 0;
            $id_student = 0;
            $unit_start = 0;
            foreach ($siswa as $murid){
                if ($murid->id_user == Auth::user()->id){
                    $status_progress = $murid->progress;
                    $id_student = $murid->id;
                    $unit_start = $murid->unit_start;
                }
            }

            $nilaiPretest = StudentPretestAnswer::select('jumlah_benar','id_unit')->where('id_student',$id_student)->get();
            $courses = Course::all();
            $arrReport1 = [
                'id_student' => $id_student,
                'id_unit' => 1,
                'id_course' =>1,
            ];
            $arrReport2 = [
                'id_student' => $id_student,
                'id_unit' => 1,
                'id_course' =>2,
            ];
            $arrReport3 = [
                'id_student' => $id_student,
                'id_unit' => 1,
                'id_course' =>3,
            ];
            $arrReport4 = [
                'id_student' => $id_student,
                'id_unit' => 2,
                'id_course' =>4,
            ];
            $arrReport5 = [
                'id_student' => $id_student,
                'id_unit' => 2,
                'id_course' =>5,
            ];
            $arrReport6 = [
                'id_student' => $id_student,
                'id_unit' => 2,
                'id_course' =>6,
            ];
            $arrReport7 = [
                'id_student' => $id_student,
                'id_unit' => 3,
                'id_course' =>7,
            ];
            $arrReport8 = [
                'id_student' => $id_student,
                'id_unit' => 3,
                'id_course' =>8,
            ];
            $arrReport9 = [
                'id_student' => $id_student,
                'id_unit' => 3,
                'id_course' =>9,
            ];
            $arrReport10 = [
                'id_student' => $id_student,
                'id_unit' => 3,
                'id_course' =>10,
            ];
            $arrReport11 = [
                'id_student' => $id_student,
                'id_unit' => 3,
                'id_course' =>11,
            ];
            $arrReport12 = [
                'id_student' => $id_student,
                'id_unit' => 3,
                'id_course' =>12,
            ];
            $arrReport13 = [
                'id_student' => $id_student,
                'id_unit' => 3,
                'id_course' =>13,
            ];
            $arrReport14 = [
                'id_student' => $id_student,
                'id_unit' => 3,
                'id_course' =>14,
            ];
            $arrReport15 = [
                'id_student' => $id_student,
                'id_unit' => 3,
                'id_course' =>15,
            ];
            $arrReport16 = [
                'id_student' => $id_student,
                'id_unit' => 4,
                'id_course' =>16,
            ];
            $arrReport17 = [
                'id_student' => $id_student,
                'id_unit' => 4,
                'id_course' =>17,
            ];
            $arrReport18 = [
                'id_student' => $id_student,
                'id_unit' => 5,
                'id_course' =>18,
            ];
            $arrReport19 = [
                'id_student' => $id_student,
                'id_unit' => 5,
                'id_course' =>19,
            ];
            $arrReport20 = [
                'id_student' => $id_student,
                'id_unit' => 5,
                'id_course' =>20,
            ];
            $arrReport21 = [
                'id_student' => $id_student,
                'id_unit' => 5,
                'id_course' =>21,
            ];
            $arrReport22 = [
                'id_student' => $id_student,
                'id_unit' => 5,
                'id_course' =>22,
            ];
            $arrReport23 = [
                'id_student' => $id_student,
                'id_unit' => 6,
                'id_course' =>23,
            ];
            $arrReport24 = [
                'id_student' => $id_student,
                'id_unit' => 6,
                'id_course' =>24,
            ];
            $arrReport25 = [
                'id_student' => $id_student,
                'id_unit' => 6,
                'id_course' =>25,
            ];
            $arrReport26 = [
                'id_student' => $id_student,
                'id_unit' => 6,
                'id_course' =>26,
            ];
            $arrReport27 = [
                'id_student' => $id_student,
                'id_unit' => 6,
                'id_course' =>27,
            ];
            $arrReport28 = [
                'id_student' => $id_student,
                'id_unit' => 6,
                'id_course' =>28,
            ];
            $arrReport29 = [
                'id_student' => $id_student,
                'id_unit' => 7,
                'id_course' =>29,
            ];
            $arrReport30 = [
                'id_student' => $id_student,
                'id_unit' => 7,
                'id_course' =>30,
            ];
            $arrReport31 = [
                'id_student' => $id_student,
                'id_unit' => 7,
                'id_course' =>31,
            ];
            $arrReport32 = [
                'id_student' => $id_student,
                'id_unit' => 7,
                'id_course' =>32,
            ];
            $arrReport33 = [
                'id_student' => $id_student,
                'id_unit' => 8,
                'id_course' =>33,
            ];
            $arrReport34 = [
                'id_student' => $id_student,
                'id_unit' => 8,
                'id_course' =>34,
            ];
            $arrReport35 = [
                'id_student' => $id_student,
                'id_unit' => 8,
                'id_course' =>35,
            ];
            $arrReport36 = [
                'id_student' => $id_student,
                'id_unit' => 8,
                'id_course' =>36,
            ];

            $report1 = Report::where($arrReport1)->orderBy('try_count','DESC')->first();
            $report2 = Report::where($arrReport2)->orderBy('try_count','DESC')->first();
            $report3 = Report::where($arrReport3)->orderBy('try_count','DESC')->first();
            $report4 = Report::where($arrReport4)->orderBy('try_count','DESC')->first();
            $report5 = Report::where($arrReport5)->orderBy('try_count','DESC')->first();
            $report6 = Report::where($arrReport6)->orderBy('try_count','DESC')->first();
            $report7 = Report::where($arrReport7)->orderBy('try_count','DESC')->first();
            $report8 = Report::where($arrReport8)->orderBy('try_count','DESC')->first();
            $report9 = Report::where($arrReport9)->orderBy('try_count','DESC')->first();
            $report10 = Report::where($arrReport10)->orderBy('try_count','DESC')->first();
            $report11 = Report::where($arrReport11)->orderBy('try_count','DESC')->first();
            $report12 = Report::where($arrReport12)->orderBy('try_count','DESC')->first();
            $report13 = Report::where($arrReport13)->orderBy('try_count','DESC')->first();
            $report14 = Report::where($arrReport14)->orderBy('try_count','DESC')->first();
            $report15 = Report::where($arrReport15)->orderBy('try_count','DESC')->first();
            $report16 = Report::where($arrReport16)->orderBy('try_count','DESC')->first();
            $report17 = Report::where($arrReport17)->orderBy('try_count','DESC')->first();
            $report18 = Report::where($arrReport18)->orderBy('try_count','DESC')->first();
            $report19 = Report::where($arrReport19)->orderBy('try_count','DESC')->first();
            $report20 = Report::where($arrReport20)->orderBy('try_count','DESC')->first();
            $report21 = Report::where($arrReport21)->orderBy('try_count','DESC')->first();
            $report22 = Report::where($arrReport22)->orderBy('try_count','DESC')->first();
            $report23 = Report::where($arrReport23)->orderBy('try_count','DESC')->first();
            $report24 = Report::where($arrReport24)->orderBy('try_count','DESC')->first();
            $report25 = Report::where($arrReport25)->orderBy('try_count','DESC')->first();
            $report26 = Report::where($arrReport26)->orderBy('try_count','DESC')->first();
            $report27 = Report::where($arrReport27)->orderBy('try_count','DESC')->first();
            $report28 = Report::where($arrReport28)->orderBy('try_count','DESC')->first();
            $report29 = Report::where($arrReport29)->orderBy('try_count','DESC')->first();
            $report30 = Report::where($arrReport30)->orderBy('try_count','DESC')->first();
            $report31 = Report::where($arrReport31)->orderBy('try_count','DESC')->first();
            $report32 = Report::where($arrReport32)->orderBy('try_count','DESC')->first();
            $report33 = Report::where($arrReport33)->orderBy('try_count','DESC')->first();
            $report34 = Report::where($arrReport34)->orderBy('try_count','DESC')->first();
            $report35 = Report::where($arrReport35)->orderBy('try_count','DESC')->first();
            $report36 = Report::where($arrReport36)->orderBy('try_count','DESC')->first();


            $course1 = count(Course::where('id_unit',1)->get());
            $course2 = count(Course::where('id_unit',2)->get());
            $course3 = count(Course::where('id_unit',3)->get());
            $course4 = count(Course::where('id_unit',4)->get());
            $course5 = count(Course::where('id_unit',5)->get());
            $course6 = count(Course::where('id_unit',6)->get());
            $course7 = count(Course::where('id_unit',7)->get());
            $course8 = count(Course::where('id_unit',8)->get());

            $units = Unit::all();

            return view('siswa.courses',[
                'statusprogress'=>$status_progress,
                'idstudent' => $id_student,
                'units' => $units,
                'courses' => $courses,
                'course1' =>$course1,
                'course2' =>$course2,
                'course3' =>$course3,
                'course4' =>$course4,
                'course5' =>$course5,
                'course6' =>$course6,
                'course7' =>$course7,
                'course8' =>$course8,
                'report1' => $report1,
                'report2' => $report2,
                'report3' => $report3,
                'report4' => $report4,
                'report5' => $report5,
                'report6' => $report6,
                'report7' => $report7,
                'report8' => $report8,
                'report9' => $report9,
                'report10' => $report10,
                'report11' => $report11,
                'report12' => $report12,
                'report13' => $report13,
                'report14' => $report14,
                'report15' => $report15,
                'report16' => $report16,
                'report17' => $report17,
                'report18' => $report18,
                'report19' => $report19,
                'report20' => $report20,
                'report21' => $report21,
                'report22' => $report22,
                'report23' => $report23,
                'report24' => $report24,
                'report25' => $report25,
                'report26' => $report26,
                'report27' => $report27,
                'report28' => $report28,
                'report29' => $report29,
                'report30' => $report30,
                'report31' => $report31,
                'report32' => $report32,
                'report33' => $report33,
                'report34' => $report34,
                'report35' => $report35,
                'report36' => $report36,
                'nilaiPretest' =>$nilaiPretest,
                'reports1' => $report1,
                'unit_taken' => $unit_start,
            ]);
        }
    }

    public function selectUnit($id_unit,$total_course){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else{
            $siswa = Student::all();
            $status_progress = 0;
            $id_student = 0;

            foreach ($siswa as $murid){
                if ($murid->id_user == Auth::user()->id){
                    $status_progress = $murid->progress;
                    $id_student = $murid->id;
                }
            }

            $courses = Course::where('id_unit',$id_unit)->get();
            $unit_name = Unit::select('name')->where('id','=',$id_unit)->first();
            $arrReport = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
            ];

            $arrReportC1 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 1,
            ];
            $arrReportC2 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 2,
            ];
            $arrReportC3 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 3,
            ];
            $arrReportC4 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 4,
            ];
            $arrReportC5 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 5,
            ];
            $arrReportC6 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 6,
            ];
            $arrReportC7 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 7,
            ];
            $arrReportC8 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 8,
            ];
            $arrReportC9 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 9,
            ];
            $arrReportC10 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 10,
            ];
            $arrReportC11 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 11,
            ];
            $arrReportC12 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 12,
            ];
            $arrReportC13 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 13,
            ];
            $arrReportC14 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 14,
            ];
            $arrReportC15 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 15,
            ];
            $arrReportC16 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 16,
            ];
            $arrReportC17 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 17,
            ];
            $arrReportC18 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 18,
            ];
            $arrReportC19 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 19,
            ];
            $arrReportC20 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 20,
            ];
            $arrReportC21 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 21,
            ];
            $arrReportC22 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 22,
            ];
            $arrReportC23 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 23,
            ];
            $arrReportC24 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 24,
            ];
            $arrReportC25 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 25,
            ];
            $arrReportC26 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 26,
            ];
            $arrReportC27 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 27,
            ];
            $arrReportC28 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 28,
            ];
            $arrReportC29 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 29,
            ];
            $arrReportC30 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 30,
            ];
            $arrReportC31 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 31,
            ];
            $arrReportC32 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 32,
            ];
            $arrReportC33 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 33,
            ];
            $arrReportC34 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 34,
            ];
            $arrReportC35 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 35,
            ];
            $arrReportC36 = [
                'id_student' => $id_student,
                'id_unit' => $id_unit,
                'id_course' => 36,
            ];

            $report = Report::where($arrReport)->get();
            $reportC1 = Report::where($arrReportC1)->orderBy('try_count','DESC')->first();
            $reportC2 = Report::where($arrReportC2)->orderBy('try_count','DESC')->first();
            $reportC3 = Report::where($arrReportC3)->orderBy('try_count','DESC')->first();
            $reportC4 = Report::where($arrReportC4)->orderBy('try_count','DESC')->first();
            $reportC5 = Report::where($arrReportC5)->orderBy('try_count','DESC')->first();
            $reportC6 = Report::where($arrReportC6)->orderBy('try_count','DESC')->first();
            $reportC7 = Report::where($arrReportC7)->orderBy('try_count','DESC')->first();
            $reportC8 = Report::where($arrReportC8)->orderBy('try_count','DESC')->first();
            $reportC9 = Report::where($arrReportC9)->orderBy('try_count','DESC')->first();
            $reportC10 = Report::where($arrReportC10)->orderBy('try_count','DESC')->first();
            $reportC11 = Report::where($arrReportC11)->orderBy('try_count','DESC')->first();
            $reportC12 = Report::where($arrReportC12)->orderBy('try_count','DESC')->first();
            $reportC13 = Report::where($arrReportC13)->orderBy('try_count','DESC')->first();
            $reportC14 = Report::where($arrReportC14)->orderBy('try_count','DESC')->first();
            $reportC15 = Report::where($arrReportC15)->orderBy('try_count','DESC')->first();
            $reportC16 = Report::where($arrReportC16)->orderBy('try_count','DESC')->first();
            $reportC17 = Report::where($arrReportC17)->orderBy('try_count','DESC')->first();
            $reportC18 = Report::where($arrReportC18)->orderBy('try_count','DESC')->first();
            $reportC19 = Report::where($arrReportC19)->orderBy('try_count','DESC')->first();
            $reportC20 = Report::where($arrReportC20)->orderBy('try_count','DESC')->first();
            $reportC21 = Report::where($arrReportC21)->orderBy('try_count','DESC')->first();
            $reportC22 = Report::where($arrReportC22)->orderBy('try_count','DESC')->first();
            $reportC23 = Report::where($arrReportC23)->orderBy('try_count','DESC')->first();
            $reportC24 = Report::where($arrReportC24)->orderBy('try_count','DESC')->first();
            $reportC25 = Report::where($arrReportC25)->orderBy('try_count','DESC')->first();
            $reportC26 = Report::where($arrReportC26)->orderBy('try_count','DESC')->first();
            $reportC27 = Report::where($arrReportC27)->orderBy('try_count','DESC')->first();
            $reportC28 = Report::where($arrReportC28)->orderBy('try_count','DESC')->first();
            $reportC29 = Report::where($arrReportC29)->orderBy('try_count','DESC')->first();
            $reportC30 = Report::where($arrReportC30)->orderBy('try_count','DESC')->first();
            $reportC31 = Report::where($arrReportC31)->orderBy('try_count','DESC')->first();
            $reportC32 = Report::where($arrReportC32)->orderBy('try_count','DESC')->first();
            $reportC33 = Report::where($arrReportC33)->orderBy('try_count','DESC')->first();
            $reportC34 = Report::where($arrReportC34)->orderBy('try_count','DESC')->first();
            $reportC35 = Report::where($arrReportC35)->orderBy('try_count','DESC')->first();
            $reportC36 = Report::where($arrReportC36)->orderBy('try_count','DESC')->first();

            $last_report_perunit = DB::table('reports')
                                ->join('courses','reports.id_course','=','courses.id_course')
                                ->select('reports.*','courses.*')
                                ->where('reports.id_unit','=',$id_unit)
                                ->get()->last();

            return view('siswa.courseByUnit',[
                'statusprogress'=>$status_progress,
                'idstudent' => $id_student,
                'courses' => $courses,
                'unit' => $unit_name,
                'reports' => $report,
                'reportsC1' => $reportC1,
                'reportsC2' => $reportC2,
                'reportsC3' => $reportC3,
                'reportsC4' => $reportC4,
                'reportsC5' => $reportC5,
                'reportsC6' => $reportC6,
                'reportsC7' => $reportC7,
                'reportsC8' => $reportC8,
                'reportsC9' => $reportC9,
                'reportsC10' => $reportC10,
                'reportsC11' => $reportC11,
                'reportsC12' => $reportC12,
                'reportsC13' => $reportC13,
                'reportsC14' => $reportC14,
                'reportsC15' => $reportC15,
                'reportsC16' => $reportC16,
                'reportsC17' => $reportC17,
                'reportsC18' => $reportC18,
                'reportsC19' => $reportC19,
                'reportsC20' => $reportC20,
                'reportsC21' => $reportC21,
                'reportsC22' => $reportC22,
                'reportsC23' => $reportC23,
                'reportsC24' => $reportC24,
                'reportsC25' => $reportC25,
                'reportsC26' => $reportC26,
                'reportsC27' => $reportC27,
                'reportsC28' => $reportC28,
                'reportsC29' => $reportC29,
                'reportsC30' => $reportC30,
                'reportsC31' => $reportC31,
                'reportsC32' => $reportC32,
                'reportsC33' => $reportC33,
                'reportsC34' => $reportC34,
                'reportsC35' => $reportC35,
                'reportsC36' => $reportC36,
                'lastreport' =>$last_report_perunit,
                'total_course_perunit' => $total_course,
            ]);
        }
    }

    public function getCourse($id_unit,$id_course){
//        echo $id_course;
//        echo $id_unit;
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else {
//            echo $_GET['total_course'];
            $siswa = Student::all();
            $status_progress = 0;
            $id_student = 0;

            foreach ($siswa as $murid) {
                if ($murid->id_user == Auth::user()->id) {
                    $status_progress = $murid->progress;
                    $id_student = $murid->id;
                }
            }

            $coursesByIdCourse = Course::select('*')->where('id_course', '=', $id_course)->first();
            $courses = Course::where('id_unit', $id_unit)->get();
            $unit_name = Unit::select('name')->where('id', '=', $id_unit)->first();


            $checkhavedone = Report::where([
                'id_student' => $id_student,
                'id_course' => $id_course,
                'id_unit' => $id_unit,
            ])->count();
            if ($checkhavedone > 0) {
                $lastScoreInCourse = DB::table('reports')
                    ->where([
                        'id_student' => $id_student,
                        'id_course' => $id_course,
                        'id_unit' => $id_unit,
                    ])
                    ->orderBy('try_count', 'desc')->get()
                    ->first()->score;
            } else {
                $lastScoreInCourse = 0;
            }
            if($id_course>= 33){
                $coursedetail = CourseDetail::where('id_course','=',$id_course)->first();

            } else {
                $coursedetail = [];
            }
            $lastCourseIDUnit = DB::table('courses')
                ->where('id_unit','=',$id_unit)
                ->orderBy('id_course','desc')->get()
                ->first()->id_course;

            return view('siswa.exercisecourse',[
                'statusprogress'=>$status_progress,
                'idstudent' => $id_student,
                'courses' => $courses,
                'unit' => $unit_name,
                'lastidcoursebyunit' => $lastCourseIDUnit,
                'coursebyid' => $coursesByIdCourse,
                'coursedetail' => $coursedetail,
                'id_unit' => $id_unit,
                'id_course' => $id_course,
                'lastscoreincourse' => $lastScoreInCourse,
            ])->with(compact('checkhavedone'));
        }
    }

    public function submitExerciseCourse(Request $request){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else{
            $this->validate($request,[
                'answer' => 'required',
            ]);
            $point = 0;
            $answer = strtolower(base64_decode($request['answer']));
            $submittedans = strtolower($request['answerrequest']);
            $count_correct = strtolower(base64_decode($request['count_corr']));
            $id_student = $request['id_std'];
            $id_course = $request['id_crs'];
            $id_unit = $request['id_unt'];

            //menentukan point yg didapat
            if (strpos($answer,'-') !== false){
                $arrAns = explode('-',$answer);
                if (strpos($submittedans,'-')){
                    $arrAnsReq = explode('-',$submittedans);
                    for ($i = 0; $i<count($arrAnsReq); $i++){
                        if (in_array($arrAnsReq[$i],$arrAns)){
                            $point+=1;
                        }
                    }
                } else {
                    if (in_array($submittedans,$arrAns)){
                        $point+=1;
                    }
                }
            } else {
                if (strpos($submittedans,'-')){
                    $arrAnsReq = explode('-',$submittedans);
                    for ($j=0;$j<count($arrAnsReq);$j++){
                        if ($answer == $arrAnsReq[$j]){
                            $point+=1;
                        }
                    }
                } else {
                    if ($answer == $submittedans){
                        $point+=1;
                    }
                }

            }

            $nilai = ($point/$count_correct)*100;

            $checkDBReport = Report::where([
                'id_student'=>$id_student,
                'id_course'=>$id_course,
                'id_unit'=>$id_unit])->orderBy('try_count','desc')->first();


            if ($checkDBReport === null){
                $report = new Report();
                $report->id_student = $id_student;
                $report->id_unit = $id_unit;
                $report->id_course = $id_course;
                $report->score = $nilai;
                $report->jawaban_siswa = $submittedans;
                $report->save();
            } else {
                $report = new Report();
                $report->id_student = $id_student;
                $report->id_unit = $id_unit;
                $report->id_course = $id_course;
                $report->score = $nilai;
                $report->jawaban_siswa = $submittedans;
                $report->try_count = $checkDBReport->try_count+1;
                $report->save();
            }
            $avgcourses = Report::where([
                'id_student'=>$id_student,
            ])->avg('score');

            Student::where([
                'id' => $id_student,
            ])->limit(1)->update([
                'avg_exercise' => $avgcourses,
            ]);

            return redirect()->route('siswa.course',[
                'id_unit'=>$id_unit,
                'id_course'=>$id_course
            ])->with('messageSubmitExercise','Your answer has been submitted!');
        }
    }

    public function submitExerciseCode(Request $request){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else{
            $id_student = $request['id_std'];
            $id_course = $request['id_crs'];
            $id_unit = $request['id_unt'];

            $code = rawurlencode($request['code']);
            $callFunction = $request['callFunction'];
            $answer = base64_decode($request['answer']);
            $apiUser = "rosihanari";
            $apiAuth = "123456";
            $url = "http://rosihanari.net/api/php-api.php";
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST',$url,[
                'form_params'=>[
                    'apiuser' => $apiUser,
                    'apiauth' => $apiAuth,
                    'input' => "",
                    'output' => $answer,
                    'callFunction' => $callFunction,
                    'code' => $code,
                ]
            ]);

            $response = $response->getBody();

            $output = json_decode($response);

            $score =0;

            if (!empty($output)&& $output->output != ""){
                if (strpos($output->output,"error")){
                    $resOutputERROR = $output->output;
                    $resOutputStatus = $output->errorDetail;

                    $checkDBReport = Report::where([
                        'id_student'=>$id_student,
                        'id_course'=>$id_course,
                        'id_unit'=>$id_unit])->orderBy('try_count','desc')->first();

                    if ($checkDBReport === null){
                        $report = new Report();
                        $report->id_student = $id_student;
                        $report->id_unit = $id_unit;
                        $report->id_course = $id_course;
                        $report->score = $score;
                        $report->error_type = "Syntax Error";
                        $report->error_desc = $resOutputERROR;
                        $report->jawaban_siswa = $request['code'];
                        $report->try_count = 1;
                        $report->save();
                    } else {
                        $report = new Report();
                        $report->id_student = $id_student;
                        $report->id_unit = $id_unit;
                        $report->id_course = $id_course;
                        $report->score = $score;
                        $report->error_type = "Syntax Error";
                        $report->error_desc = $resOutputStatus;
                        $report->jawaban_siswa = $request['code'];
                        $report->try_count = $checkDBReport->try_count+1;
                        $report->save();
                    }

                } else {
                    $resOutputOK = $output->output;
                    $resOutputStatus = $output->outputStatus;

                    $checkDBReport = Report::where([
                        'id_student'=>$id_student,
                        'id_course'=>$id_course,
                        'id_unit'=>$id_unit])->orderBy('try_count','desc')->first();

                    if ($checkDBReport === null){
                        $report = new Report();
                        $report->id_student = $id_student;
                        $report->id_unit = $id_unit;
                        $report->id_course = $id_course;

                        if ($resOutputStatus == 0){
                            $report->error_type = "Algorithm Error";
                            $report->error_desc = "Missmatch Answer: ".$answer." -> ".$resOutputOK;
                            $report->score = 75;
                        } else {
                            $report->error_type = "Correct!";
                            $report->error_desc = "Good Answer: (".$resOutputOK.")";
                            $report->score = 100;
                        }
                        $report->jawaban_siswa = $request['code'];
                        $report->try_count = 1;
                        $report->save();
                    } else {
                        $report = new Report();
                        $report->id_student = $id_student;
                        $report->id_unit = $id_unit;
                        $report->id_course = $id_course;

                        if ($resOutputStatus == 0){
                            $report->error_type = "Algorithm Error";
                            $report->error_desc = "Missmatch Answer: ".$answer." -> ".$resOutputOK;
                            $report->score = 75;
                        } else {
                            $report->error_type = "Correct!";
                            $report->error_desc = "Good Answer: (".$resOutputOK.")";
                            $report->score = 100;
                        }
                        $report->jawaban_siswa = $request['code'];
                        $report->try_count = $checkDBReport->try_count+1;
                        $report->save();
                    }
                }
                $avgcourses = Report::where([
                    'id_student'=>$id_student,
                ])->avg('score');

                Student::where([
                    'id' => $id_student,
                ])->limit(1)->update([
                    'avg_exercise' => $avgcourses,
                ]);
            } else {
                return redirect()->route('siswa.course',[
                    'id_unit'=>$id_unit,
                    'id_course'=>$id_course
                ])->with('messageCaution','Your must write your code before submitting');
            }

            return redirect()->route('siswa.course',[
                'id_unit'=>$id_unit,
                'id_course'=>$id_course
            ])->with('messageSubmitExercise','Your answer has been submitted!');
        }
    }

    public function submitExerciseTeori(Request $request){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else{
            $id_student = $request['id_std'];
            $id_course = $request['id_crs'];
            $id_unit = $request['id_unt'];
            $submittedans = $request['answerrequest'];
            $answer = base64_decode($request['answer']);
            $count_correct = strtolower(base64_decode($request['count_corr']));

            $point = 0;
            if (strpos($answer,'-') !== false){
                $arrAns = explode('-',$answer);
                if (strpos($submittedans,'-')){
                    $arrAnsReq = explode('-',$submittedans);
                    for ($i = 0; $i<count($arrAnsReq); $i++){
                        if (in_array($arrAnsReq[$i],$arrAns)){
                            $point+=1;
                        }
                    }
                } else {
                    if (in_array($submittedans,$arrAns)){
                        $point+=1;
                    }
                }
            } else {
                if (strpos($submittedans,'-')){
                    $arrAnsReq = explode('-',$submittedans);
                    for ($j=0;$j<count($arrAnsReq);$j++){
                        if ($answer == $arrAnsReq[$j]){
                            $point+=1;
                        }
                    }
                } else {
                    if ($answer == $submittedans){
                        $point+=1;
                    }
                }

            }

            $nilai = ($point/$count_correct)*100;
            $checkDBReport = Report::where([
                'id_student'=>$id_student,
                'id_course'=>$id_course,
                'id_unit'=>$id_unit])->orderBy('try_count','desc')->first();


            if ($checkDBReport === null){
                $report = new Report();
                $report->id_student = $id_student;
                $report->id_course = $id_course;
                $report->id_unit = $id_unit;
                $report->score = $nilai;
                $report->jawaban_siswa = $submittedans;
                $report->try_count = 1;
                $report->save();
            } else {
                $report = new Report();
                $report->id_student = $id_student;
                $report->id_course = $id_course;
                $report->id_unit = $id_unit;
                $report->score = $nilai;
                $report->jawaban_siswa = $submittedans;
                $report->try_count = $checkDBReport->try_count+1;
                $report->save();
            }

            $avgcourses = Report::where([
                'id_student'=>$id_student,
            ])->avg('score');

            Student::where([
                'id' => $id_student,
            ])->limit(1)->update([
                'avg_exercise' => $avgcourses,
            ]);

            return redirect()->route('siswa.course',[
                'id_unit'=>$id_unit,
                'id_course'=>$id_course
            ])->with('messageSubmitExercise','Your answer has been submitted!');
        }
    }


    public function getExamTest(){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else{
            $siswa = Student::all();

            $status_progress = 0;
            $status_pretest = 0;
            $id_student = 0;
            $nilai_final = 0;
            $progres_fintes=0;

            foreach ($siswa as $murid) {
                if ($murid->id_user == Auth::user()->id) {
                    $id_student = $murid->id;
                    $status_progress = $murid->progress;
                    $status_pretest = $murid->progress_pretest_unit;
                    $nilai_final = $murid->nilai_final;
                    $progres_fintes = $murid->chapter_done_count;
                }
            }

            return view('siswa.finalTest',[
                'uid'=> Auth::user()->id,
                'idstudent'=>$id_student,
                'statuspretest'=>$status_pretest,
                'statusprogress'=>$status_progress,
                'nilaifinal' => $nilai_final,
                'progresfinaltest' => $progres_fintes,
            ]);
        }
    }

    public function submitTestSecOne(Request $request){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else {
//            echo base64_decode($request['scorefinaltest'])/20;
            $nilai = base64_decode(request('scorefinaltest'));
            $uid = base64_decode(request('uid'));
            $submit = request('submit');
            $id_tipe = request('progress');
            $id_student = Student::where('id_user',$uid)->first()->id;


//            echo $nilaipretest;
            if (isset($submit)){
                if (StudentFinalExamRecord::where(['id_student' => $id_student, 'id_tipe' =>$id_tipe])->count() > 0){
                    StudentFinalExamRecord::where(['id_student' => $id_student, 'id_tipe' =>$id_tipe])->delete();
                }

                $student_exam = new StudentFinalExamRecord();
                $student_exam->id_student = $id_student;
                $student_exam->id_tipe = $id_tipe;
                $student_exam->jumlah_benar = $nilai*5;
                $student_exam->save();

                Student::where('id_user', '=',$uid)
                    ->limit(1)
                    ->update([
                        'chapter_done_count' => $id_tipe,
                    ]);

            }

            return redirect()->route('siswa.getexam');
        }
    }

    public function goToSectionTwo(){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else {
//            echo $_GET['total_course'];
            $siswa = Student::all();
            $status_progress = 0;
            $id_student = 0;

            foreach ($siswa as $murid) {
                if ($murid->id_user == Auth::user()->id) {
                    $status_progress = $murid->progress;
                    $id_student = $murid->id;
                }
            }

            return view('siswa.finaltestsec2',[
                'statusprogress'=>$status_progress,
                'idstudent' => $id_student,
            ]);
        }
    }

    public function submitSectionTwo(Request $request){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else {
//            echo base64_decode($request['answer']);
            $id_tipe = request('progress');
            $id_student = $request['id_std'];
            $answer = base64_decode($request['answer']);

            $code = rawurlencode($request['code']);
            $apiUser = "rosihanari";
            $apiAuth = "123456";
            $url = "http://rosihanari.net/api/php-api.php";
            $client = new \GuzzleHttp\Client();

            $response = $client->request('POST',$url,[
                'form_params'=>[
                    'apiuser' => $apiUser,
                    'apiauth' => $apiAuth,
                    'input' => "",
                    'output' => $answer,
                    'callFunction' => "",
                    'code' => $code,
                ]
            ]);

            $response = $response->getBody();

            $output = json_decode($response);

            if (StudentFinalExamRecord::where(['id_student' => $id_student, 'id_tipe' => $id_tipe])->count() > 0) {
                StudentFinalExamRecord::where(['id_student' => $id_student, 'id_tipe' => $id_tipe])->delete();
            }

            $reportexam = new StudentFinalExamRecord();

            if (!empty($output)&& $output->output != ""){
                if (strpos($output->output,"error")){

                    $reportexam->id_student = $id_student;
                    $reportexam->id_tipe = $id_tipe;
                    $reportexam->jumlah_benar = 0;
                    $reportexam->save();
                } else {
                    $reportexam->id_student = $id_student;
                    $reportexam->id_tipe = $id_tipe;
                    if ($output->outputStatus == 0){
                        if (strpos($request['code'],"for") !==  false){
                            $score = 75;
                        } else {
                            $score = 50;
                        }
                    } else {
                        if (strpos($request['code'],"for") !==  false){
                            $score = 100;
                        } else {
                            $score = 50;
                        }
                    }

                    $reportexam->jumlah_benar = $score;
                    $reportexam->save();
                }
                $avgFinalTest = StudentFinalExamRecord::where([
                    'id_student' => $id_student,
                ])->avg('jumlah_benar');

                Student::where([
                    'id' => $id_student,
                ])->limit(1)->update([
                    'nilai_final' => round($avgFinalTest),
                    'chapter_done_count' => 2,
                ]);

            } else {
                return redirect()->route('siswa.getexam')
                    ->with('messageCaution','Your must write your code before submitting');
            }

            return redirect()->route('siswa.getexam')
                ->with('messageSubmitTestCode','Your answer has been submitted!');
        }
    }

    public function resetExam(Request $request){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else {
            $id_student = base64_decode($request['id_std']);
            Student::where([
                'id' => $id_student,
            ])->limit(1)->update([
                'chapter_done_count' => 0,
                'nilai_final' => null,
            ]);
            StudentFinalExamRecord::where([
                'id_student' => $id_student,
                ])->delete();

            return redirect()->route('siswa.getexam')
                ->with('messageSubmitTestCode','Your Exam Record has been destroyed!');
        }
    }
}
