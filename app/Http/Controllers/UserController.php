<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Student;
use App\Course;
use App\Report;
use App\Student_course;
use App\StudentPretestAnswer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Unicodeveloper\EmailValidator\EmailValidator;
use LaravelVideoEmbed;

class UserController extends Controller
{

    public function getDashboardSiswa(){
        $siswa = Student::all();

        $status_progress = 0;
        $status_pretest = 0;
        $nilaifinal = 0;
        $id_student = 0;
        foreach ($siswa as $murid){
            if ($murid->id_user == Auth::user()->id){
                $status_progress = $murid->progress;
                $status_pretest = $murid->progress_pretest_unit;
                $nilaifinal = $murid->avg_nilai_final;
                $id_student = $murid->id;
            }
        }

        $nilairata2pretest = StudentPretestAnswer::where('id_student',$id_student)->avg('jumlah_benar');
        $nilaitertinggipretest = StudentPretestAnswer::where('id_student',$id_student)->max('jumlah_benar');
//        $nilaiterendahpretest = StudentPretestAnswer::where('id_student',$id_student)->min('jumlah_benar');
        $avgcourses = Report::where('id_student',$id_student)->avg('score');

//        setcookie("id_student",$id_student,time()+(10*365*24*60*60));

        $unit_siswa = Student::select('unit_start')->where('id_user',Auth::user()->id)->first()->unit_start;
        $updateReportSiswa = Report::where('id_student', $id_student)->get()->last();

        return view('siswa.dashboard',[
            'statusprogress'=>$status_progress,
            'statuspretest'=>$status_pretest,
            'unit'=>$unit_siswa,
            'nilaipretest'=>$nilairata2pretest*20,
            'nilaipretestmax' => $nilaitertinggipretest*20,
            'nilaicoursesavgmin' => $avgcourses*20,
            'nilaifinal' => $nilaifinal,
            'lastreportupdate' => $updateReportSiswa
        ]);
    }

    public function getDashboardPengajar(){
        $courses = Course::all();
        $siswa = Student::all();
        $adminnotverified = User::where('verified',0)->get();
        $adminnotverifiedcount = $adminnotverified->count();

        $lastuser = DB::table('students')->orderBy('created_at','desc')->first();

        return view('pengajar.dashboard',[
            'students'=>$siswa,
            'lateststudent'=>$lastuser,
            'courses'=>$courses,
            'admincountnorver' => $adminnotverifiedcount,
            'adminnotverfied' =>$adminnotverified
        ]);
    }
    public function getLogin(){
        return view('auth.login');
    }

    public function getRegister(){
        return view('auth.register');
    }

    function get_client_ip() {
        $ipaddress = "";
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    public function postSignIn(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = array(
            'username' => $request['username'],
            'password' => $request['password'],
        );

        if(Auth::attempt($credentials)){
            if (!empty($request['remember'])){
                setcookie("remember_login",base64_encode($request['username']),time()+(10*365*24*60*60));
                setcookie("remember_pass",base64_encode($request['password']),time()+(10*365*24*60*60));
            } else {
                if (isset($_COOKIE['remember_login'])){
                    setcookie("remember_login","");
                }
                if (isset($_COOKIE['remember_pass'])){
                    setcookie("remember_pass","");
                }
            }
//            echo Auth::user()->verified;
            if (Auth::user()->verified == 1){
                User::where('id','=',Auth::user()->id)
                    ->update([
                        'last_login_at' => date("Y-m-d H:i:s"),
                        'last_login_ip' => $this->get_client_ip()
                    ]);
                if (Auth::user()->roles[0]['name'] == "siswa"){
                    return redirect()->route('siswa.dashboard');
                } else {
                    return redirect()->route('pengajar.dashboard');
                }
            } else {
                Auth::logout();
                return redirect('/login')->with('messageLogin','User is unverifiable! Please check your email to verifying your account!');
            }
        }
        return redirect()->back()->with('messageLogin','Incorrect username or password');
    }

    public function postSignUp(Request $request){
        $role_user = Role::where('name','siswa')->first();
        $role_admin = Role::where('name','pengajar')->first();
        $this->validate($request,[
            'name' => 'required|max:120',
            'email' => 'email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|max:1'
        ]);

        echo $request['name']."</br>";
        echo $request['email']."</br>";
        echo $request['username']."</br>";
        echo $request['password']."</br>";
        echo $request['role']."</br>";

        $name = $request['name'];
        $email = $request['email'];
        $username = $request['username'];
        $password = bcrypt($request['password']);
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->username = $username;
        $user->password = $password;

        $mail = new EmailValidator();
        $emailvalidator = $mail->verify($email)->isValid()[0];
        if ($emailvalidator){
            Auth::login($user);
            if ($request['role'] == "1"){
                $user->verified = 0;
                $user->save();
                $user->roles()->attach($role_admin);
                return redirect()->route('pengajar.dashboard');
            } else {
                $user->verified = 1;
                $user->save();
                $user->roles()->attach($role_user);
                $lastid = $user->id;
                $student = new Student();
                $student->id_user = $lastid;
                $student->email = $email;
                $student->name = $name;
                $student->save();
                return redirect()->route('siswa.dashboard');
            }
        } else {
            return redirect()->back()->with('messageLogin','Whoops! The Email you entered is unverifiable');
        }
    }

    public function logout(Request $request){
        Auth::logout();
//        if (isset($_COOKIE['id_student'])) {
//            setcookie("id_student", "");
//        }
        return redirect('/login');
    }
}
