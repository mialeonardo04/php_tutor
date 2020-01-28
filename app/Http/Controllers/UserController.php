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
use Illuminate\Support\Facades\Input;
use Mail;
use Swift_Mailer;
use Illuminate\Support\Facades\URL;
use Swift_Transport;
use Swift_Message;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Unicodeveloper\EmailValidator\EmailValidator;
use LaravelVideoEmbed;

class UserController extends Controller
{

    public function cekSessionCred(){
        if (session()->getId() != Auth::user()->last_session){
            $this->logout();
            return true;
        }
    }
    public function getDashboardSiswa(){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else{
            $siswa = Student::all();

            $status_progress = 0;
            $status_pretest = 0;
            $nilaifinal = 0;
            $id_student = 0;
            $nilairata2pretest = 0;
            foreach ($siswa as $murid){
                if ($murid->id_user == Auth::user()->id){
                    $status_progress = $murid->progress;
                    $status_pretest = $murid->progress_pretest_unit;
                    $nilaifinal = $murid->nilai_final;
                    $id_student = $murid->id;
                    $nilairata2pretest = $murid->avg_pretest;
                }
            }

            $nilaitertinggipretest = StudentPretestAnswer::where('id_student',$id_student)->max('jumlah_benar');

            $avgcourses = Report::where('id_student',$id_student)->avg('score');

            $unit_siswa = Student::select('unit_start')->where('id_user',Auth::user()->id)->first()->unit_start;
            $updateReportSiswa = Report::where('id_student', $id_student)->get()->last();

            return view('siswa.dashboard',[
                'statusprogress'=>$status_progress,
                'statuspretest'=>$status_pretest,
                'unit'=>$unit_siswa,
                'nilaipretest'=>$nilairata2pretest,
                'nilaipretestmax' => $nilaitertinggipretest*20,
                'nilaicoursesavgmin' => $avgcourses,
                'nilaifinal' => $nilaifinal,
                'lastreportupdate' => $updateReportSiswa
            ]);
        }
    }

    public function getDashboardPengajar(){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else{
            $courses = Course::all();
            $siswa = Student::all();
            $whereclause = array(
                'users.verified' => 1,
                'user_role.role_id' => 1,
            );
            $users = DB::table('users')
                ->join('user_role','users.id','=','user_role.user_id')
                ->select('users.*')
                ->where($whereclause)
                ->get();

            $whereclause2 = array(
                'users.verified' => 1,
                'user_role.role_id' => 2,
            );
            $latestuser = DB::table('users')
                ->join('user_role','users.id','=','user_role.user_id')
                ->select('users.*')
                ->where($whereclause2)
                ->orderBy('created_at','desc')
                ->first();

            $adminnotverified = User::where('verified',0)->get();
            $adminnotverfiedcount = $adminnotverified->count();

            $lastuser = DB::table('students')->orderBy('created_at','desc')->first();

            return view('pengajar.dashboard',[
                'users' => $users,
                'latestuser' => $latestuser,
                'students'=>$siswa,
                'lateststudent'=>$lastuser,
                'courses'=>$courses,
                'adminnotverfied' =>$adminnotverified,
                'adminnotverfiedcount' => $adminnotverfiedcount,
            ]);
        }
    }

    public function updateVerifyUser(Request $request){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else{
            if (isset($request['accepted'])){
                User::where("id", '=',  $request['iduser'])
                    ->limit(1)
                    ->update(['verified'=>1]);
            }

            if (isset($request['denied'])){
                User::where("id", '=',  $request['iduser'])->delete();
                DB::table('user_role')->where('user_id','=',$request['iduser'])->delete();
            }
            return redirect()->back();
        }
    }
    public function getLogin(){
        return view('auth.login');
    }

    public function getRegister(){
        return view('auth.register');
    }

    public function getProfile($id){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else{
            $siswa = Student::all();
            $status_progress = 0;
            foreach ($siswa as $murid) {
                if ($murid->id_user == $id) {
                    $status_progress = $murid->progress;
                }
            }

            return view('userprofile',[
                'statusprogress' => $status_progress,
            ]);
        }
    }

    public function updateProfile(Request $request , $id){
        if (session()->getId() != Auth::user()->last_session){
            Auth::logout();
            return redirect('/login');
        } else{
            if (isset($request['submit'])){
                $name = $request['name'];
//                 var_dump($request->file('fileku'));
                if ($request->hasFile('fileku')) {
                    $file = $request->file('fileku');

                    $file_name =$file->getClientOriginalName();
                    $destination = base_path() . '/public/images';

                    $request->file('fileku')->move($destination, $id.'_'.$name);

                    User::where('id','=',$id)
                        ->update([
                            'name' => $name,
                            'photo_name' => $file_name,
                        ]);
                }
                return redirect('/');
            }
        }
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
//                User::where('id','=',Auth::user()->id)
//                    ->update([
//                        'last_login_at' => date("Y-m-d H:i:s"),
//                        'last_login_ip' => $this->get_client_ip()
//                    ]);
                User::where('id','=',Auth::user()->id)
                    ->update([
                        'last_session' => session()->getId(),
                    ]);
                if (Auth::user()->roles[0]['name'] == "siswa"){
                    return redirect()->route('siswa.dashboard');
                } else {
                    return redirect()->route('pengajar.dashboard');
                }
            } else {
                Auth::logout();
                return redirect('/login')->with('messageLogin','User is unverifiable! Please ask another teacher to verifying your account!');
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

//        echo $request['name']."</br>";
//        echo $request['email']."</br>";
//        echo $request['username']."</br>";
//        echo $request['password']."</br>";
//        echo $request['role']."</br>";

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

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}
