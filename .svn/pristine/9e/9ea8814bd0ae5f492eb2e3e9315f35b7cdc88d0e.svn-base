<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\DoctorRequest;
use App\Http\Requests\EditDoctorRequest;
use App\Http\Requests\GeneralRequest;
use App\BasicInfo;
use App\Doctor;

use Laracasts\Flash\Flash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $doctors = Doctor::paginate(15);
        $corp_name = BasicInfo::first();
        return view('backend.doctor.profiles_list', compact('doctors', 'corp_name'));
    }

    /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations(GeneralRequest $request)
    {
        $users = '';
        if($request->input('delete')) {      
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $doctor_id) {
                    $users .= $doctor_id . '-';
                }
                return redirect('admin/doctors/list/all/' . $users . '/delete');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
            }
            return redirect('admin/doctors/list');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $corp_name = BasicInfo::first();
        return view('backend.doctor.create_profile', compact('corp_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(DoctorRequest $request)
    {
        $doctor = new Doctor;
        $doctor->name = $request->input('name');
        $doctor->specialization = $request->input('specialization');
        $file = $request->file('basic_photo');
        if (!empty($file)){
            $doctor->basic_photo = $file->getClientOriginalName();
            $file = $file->move('img/uploaded/doctor/', $file->getClientOriginalName());
        }
        $doctor->save();
        Flash::success("تم الحفظ بنجاح");
        return redirect('admin/doctors/create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        $corp_name = BasicInfo::first();
        return view('backend.doctor.edit_doctor', compact('doctor', 'corp_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(EditDoctorRequest $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->name = $request->input('name');
        $doctor->specialization = $request->input('specialization');
        $file = $request->file('basic_photo');
        if (!empty($file)){
            $doctor->basic_photo = $file->getClientOriginalName();
            $file = $file->move('img/uploaded/doctor/', $file->getClientOriginalName());
        }
        $doctor->update();
        Flash::success("تم التعديل بنجاح");
        return redirect('admin/doctors/list/'. $id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        $corp_name = BasicInfo::first();
        return view('backend.doctor.delete_doctor', compact('doctor', 'corp_name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/doctors/list');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy_all()
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $profiles = $tokens[5];
        $explode = explode('-', $profiles);
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                $Doctor = Doctor::find($value);
                $Doctor->delete();
                Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/doctors/list');
    }
}
