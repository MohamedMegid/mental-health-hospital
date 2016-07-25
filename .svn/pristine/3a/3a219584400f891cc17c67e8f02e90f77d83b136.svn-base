<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\BannerRequest;
use App\Http\Requests\GeneralRequest;
use App\Http\Requests\EditBannersRequest;
use App\BasicInfo;
use App\Banner;

use Laracasts\Flash\Flash;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $query = Banner::select();
        if (!empty($_GET['position'])){
            $position = $_GET['position'];
            $query->where('position', '=', $position);
        }
        $banners = $query->paginate(15);
        $corp_name = BasicInfo::first();
        return view('backend.banner.list_banners', compact('banners', 'corp_name'));
    }

    /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations(GeneralRequest $request)
    {
        $banners = '';
        if($request->input('delete')) {      
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $banner_id) {
                    $banners .= $banner_id . '-';
                }
                return redirect('admin/banners/list/all/' . $banners . '/delete');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
            }
            return redirect('admin/banners/list');
        }
        else if($request->input('search')){
            $position = $request->input('position');
            return redirect('admin/banners/list?position='. $position);
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
        return view('backend.banner.create_banner', compact('corp_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BannerRequest $request)
    {
        $banner = new Banner;
        $banner->title = $request->input('title');
        $banner->link = $request->input('link');
        $banner->position = $request->input('position');
        $file = $request->file('basic_photo');
        if (!empty($file)){
            $banner->basic_photo = $file->getClientOriginalName();
            $file = $file->move('img/uploaded/banner/', $file->getClientOriginalName());
        }
        $banner->save();
        Flash::success("تم الحفظ بنجاح");
        return redirect('admin/banners/create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        $corp_name = BasicInfo::first();
        return view('backend.banner.edit_banner', compact('banner','corp_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(EditBannersRequest $request, $id)
    {
        $banner = Banner::find($id);
        $banner->title = $request->input('title');
        $banner->link = $request->input('link');
        $banner->position = $request->input('position');
        $file = $request->file('basic_photo');
        if (!empty($file)){
            $banner->basic_photo = $file->getClientOriginalName();
            $file = $file->move('img/uploaded/banner/', $file->getClientOriginalName());
        }
        $banner->update();
        Flash::success("تم التعديل بنجاح");
        return redirect('admin/banners/list/'. $id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $banner = Banner::find($id);
        $corp_name = BasicInfo::first();
        return view('backend.banner.delete_banner', compact('banner', 'corp_name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/banners/list');
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
        $views = $tokens[5];
        $explode = explode('-', $views);
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                $banner = Banner::find($value);
                $banner->delete();
                Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/banners/list');
    }
}
