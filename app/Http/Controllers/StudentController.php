<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Course;
use App\Unit;
use App\Report;
use App\StudentPretestAnswer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
                    $std_ptest = StudentPretestAnswer::all();
                    foreach ($std_ptest as $pt){
                        if ($pt->jumlah_benar<3){
                            $unit_start ++;
                        }
                    }

                    Student::where('id_user','=',$uid)
                        ->limit(1)
                        ->update([
                            'progress' => $progress,
                            'avg_pretest' => $avg_pretest*20,
                            'unit_start' => $unit_start,
                        ]);

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
            $arrReport = [
                'id_student' => $id_student,
            ];
            $report = Report::where($arrReport)->get();
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
                'nilaiPretest' =>$nilaiPretest,
                'reports' => $report,
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

            $report = Report::where($arrReport)->get();
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
                'lastreport' =>$last_report_perunit,
                'total_course_perunit' => $total_course,
            ]);
        }
    }

    public function getCourse($id_course){
        echo $id_course;
    }
}
