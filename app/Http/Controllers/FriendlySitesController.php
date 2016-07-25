<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\FriendlySitesRequest;
use App\Http\Requests\GeneralRequest;
use App\BasicInfo;
use App\FriendlySites;

use Laracasts\Flash\Flash;

class FriendlySitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sites = FriendlySites::paginate(15);
        $corp_name = BasicInfo::first();
        return view('backend.friendly_sites.list_fsites', compact('sites', 'corp_name'));
    }

    /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations(GeneralRequest $request)
    {
        $views = '';
        if($request->input('delete')) {      
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $site_id) {
                    $views .= $site_id . '-';
                }
                return redirect('admin/friendly-sites/list/all/' . $views . '/delete');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
            }
            return redirect('admin/friendly-sites/list');
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
        return view('backend.friendly_sites.create_fsites',compact('corp_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(FriendlySitesRequest $request)
    {
        $site = new FriendlySites;
        $site->title = $request->input('title');
        $site->link = $request->input('link');
        $site->save();
        Flash::success("تم الحفظ بنجاح");
        return redirect('admin/friendly-sites/create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $site = FriendlySites::find($id);
        $corp_name = BasicInfo::first();
        return view('backend.friendly_sites.edit_fsites', compact('site', 'corp_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(FriendlySitesRequest $request, $id)
    {
        $site = FriendlySites::find($id);
        $site->title = $request->input('title');
        $site->link = $request->input('link');
        $site->update();
        Flash::success("تم التعديل بنجاح");
        return redirect('admin/friendly-sites/list/'. $id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $site = FriendlySites::find($id);
        $corp_name = BasicInfo::first();
        return view('backend.friendly_sites.delete_fsites', compact('site', 'corp_name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $site = FriendlySites::find($id);
        $site->delete();
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/friendly-sites/list');
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
                $social = FriendlySites::find($value);
                $social->delete();
                Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/friendly-sites/list');
    }
}
