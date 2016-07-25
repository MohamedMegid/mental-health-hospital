<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Http\Requests\auth\RegisterRequest;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\EditRegisterDoctorRequest;
use App\Http\Requests\ConfirmRequest;
use App\Http\Requests\RegisterDoctorRequest;

use App\User as w_user;
use Auth;
use Mail;

use App\Page;
use App\BasicInfo;
use App\RegisterDoctor;
use App\SocialMedia;

use Laracasts\Flash\Flash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return Response
     */
    public function getRegister()
    {
        $pages = Page::all();
        $content = BasicInfo::first();
        $social = SocialMedia::all();
        return view('auth.register', compact('pages', 'content', 'social'));
    }
 
    /**
     * Handle a registration request for the application.
     *
     * @param  RegisterRequest  $request
     * @return Response
     */
    public function postRegister(RegisterRequest $request)
    {
        $user = new w_user;
        $name = $request->input('name');
        $email = $request->input('email');
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($request->input('password'));
        $confirmation_code = str_random(30);
        $user->confirmation_code = $confirmation_code;
        $user->save();
    
        $social = SocialMedia::all();
        $user = User::orderBy('id', 'desc')->first();
        Mail::send('auth.email_verify', ['confirmation_code' => $user->confirmation_code, 'social' => $social], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('شكرا على التسجيل!');
        });
        Flash::success('شكرا على التسجيل, من فضلك افحص البريد الالكتروني');
        return redirect('/auth/login'); 
    }

    /**
     * Confirm verifying E-mail
     */
    public function confirm_form()
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $code = $tokens[3];
        $pages = Page::all();
        $content = BasicInfo::first();
        //$code = Auth::user()->confirmation_code;
        $social = SocialMedia::all();
        return view('auth.confirmation_form', compact('code', 'pages', 'content', 'social'));
    }

    /**
     * Confirm verifying E-mail
     */
    public function confirm(ConfirmRequest $request)
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $confirmation_code = $tokens[3];
        $code = $request->input('code');
        if ($confirmation_code != $code){
            Flash::message('غير مطابق لكود التأكيد');
            return redirect('/register/verify/'. $code);;
        }
        else{
            $user = w_user::where('confirmation_code', '=', $code)->first();
            $user->confirmed = 1;
            $user->save();
        }
        Flash::message('تم تفعيل الحساب بنجاح');

        return  redirect('/auth/login');
    }

    /**
     * Show the application login form.
     *
     * @return Response
     */
    public function getadmin()
    {
        $user = w_user::where('id', '=', 1)->first();
        return view('auth.admin_login',compact('user'));
    }

    /**
     * Handle a login request to the application.
     *
     * @param  LoginRequest  $request
     * @return Response
     */
    public function postadmin(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = ($request->input('remember')) ? true : false;
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember))
        {
            return redirect('/admin/dashboard'); //TODO return redirect('/admin/home');
        }
        else{
            return redirect('admin/auth/login')->withErrors([
                'email' => 'خطأ في البريد الالكتروني او كلمة السر, حاول مرة اخرى',
            ]);
        }
    }

    /**
     * Show the application login form.
     *
     * @return Response
     */
    public function getLogin()
    {
        $pages = Page::all();
        $content = BasicInfo::first();
        $social = SocialMedia::all();
        return view('auth.login', compact('pages', 'content', 'social'));
    }
 
    /**
     * Handle a login request to the application.
     *
     * @param  LoginRequest  $request
     * @return Response
     */
    public function postLogin(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = ($request->input('remember')) ? true : false;
        if (Auth::attempt(['email' => $email, 'password' => $password, 'confirmed' => 1], $remember))
        {
            return redirect('/home'); //TODO return redirect('/home');
        }
                else{
            return redirect('/auth/login')->withErrors([
                'email' => 'خطأ في البريد الالكتروني او كلمة السر, حاول مرة اخرى',
            ]);
        }
    }
 
    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getLogout()
    {
        Auth::logout();
        
        return redirect('/home')->withErrors([
                'User' => 'تم خروج العضو',
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function AdmingetLogout()
    {
        Auth::logout();
        
        return redirect('/admin/auth/login')->withErrors([
                'User' => 'تم خروج مدير النظام',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getprofile()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', '=', $user_id)->first();
        $pages = Page::all();
        $content = BasicInfo::first();
        $social = SocialMedia::all();
        return view('frontend.users.edit_form', compact('user', 'pages', 'content', 'social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function postprofile(EditRegisterDoctorRequest $request)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $emails = User::where('id', '!=', $user_id)->get();
        $user->name = $request->input('name');
        foreach ($emails as $key => $value) {
            if ($value->email ==  $request->input('email')){
                Flash::error('تم تفعيل هذا البريد من قبل');
                return redirect('auth/profile');
            }
            else{
                $user->email = $request->input('email');
            }
        }
        if (!empty($request->input('password'))){
            if ($request->input('password') == $request->input('password_confirmation')){
                $user->password = bcrypt($request->input('password'));
            }
            else{
                Flash::error('كلمة السر غير متابقة للتأكيد');
                return redirect('auth/profile');
            }
        }
        $user->update();
        Flash::success('تم التعديل بنجاح');

        return redirect('auth/profile');
    }

    public function addadmins(){
        $corp_name = BasicInfo::first();
        return view('backend.registration.register_admins', compact('corp_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function storeadmins(RegisterDoctorRequest $request)
    {
        $user = new RegisterDoctor;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = 1;
        $user->confirmed = 1;
        $user->password = bcrypt($request->input('password'));
        $user->save();
        Flash::success('تم اضافة العضو الجديد بنجاح');
        return redirect('admin/add/admins'); 
    }
}