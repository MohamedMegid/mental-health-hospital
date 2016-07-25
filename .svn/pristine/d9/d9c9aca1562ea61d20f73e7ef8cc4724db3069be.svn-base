<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\RegisterDoctorRequest;
use App\Http\Requests\EditRegisterDoctorRequest;
use App\RegisterDoctor;
use App\User;
use Mail;
use App\BasicInfo;

use Laracasts\Flash\Flash;

class RegisterDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::where('role_id', '!=', 1)->paginate(20);
        $corp_name = BasicInfo::first();
        return view('backend.registration.users_list', compact('users', 'corp_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $corp_name = BasicInfo::first();
        return view('backend.registration.register', compact('corp_name'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(RegisterDoctorRequest $request)
    {
        $user = new RegisterDoctor;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = 2; // 2 stand for doctor role
        $user->password = bcrypt($request->input('password'));
        $user->save();
        Flash::success('تم اضافة العضو الجديد بنجاح');
        return redirect('admin/register/user'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $corp_name = BasicInfo::first();
        return view('backend.registration.users_delete', compact('user', 'corp_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::where('id', '=', $id)->first();
        $corp_name = BasicInfo::first();
        return view('backend.registration.users_edit', compact('user', 'corp_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(EditRegisterDoctorRequest $request)
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $user_id = $tokens[4];
        $user = User::where('id', '=', $user_id)->first();
        $emails = User::where('id', '!=', $user_id)->get();
        $user->name = $request->input('name');
        foreach ($emails as $key => $value) {
            if ($value->email ==  $request->input('email')){
                Flash::error('تم تفعيل هذا البريد من قبل');
                return redirect('admin/register/users/' . $id . '/edit');
            }
            else{
                $user->email = $request->input('email');
            }
        }
        if (!empty($request->input('password'))){
            if (strlen($request->input('password')) < 8){
                Flash::error('كلمة السر يجب الا تقل عن 8 (ارقام او حروف او ..)');
                return redirect('admin/register/users/' . $user_id . '/edit');
            }
            if ($request->input('password') == $request->input('password_confirmation')){
                $user->password = bcrypt($request->input('password'));
            }
            else{
                Flash::error('كلمة السر غير متابقة للتأكيد');
                return redirect('admin/register/users/' . $user_id . '/edit');
            }
        }
        $user->update();
        Flash::success('تم التعديل بنجاح');
        return redirect('admin/register/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/register/users');
    }
}
