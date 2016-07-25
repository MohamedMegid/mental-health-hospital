<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SpecialPages;

use App\Http\Requests\SpecialPagesRequest;

use Laracasts\Flash\Flash;

use App\Http\Requests\BasicInfoRequest;
use App\Page;
use App\BasicInfo;
use App\SocialMedia;
class SpecialPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $url = $_SERVER['REQUEST_URI'];
        $explode = explode('/', $url);
        $page_id = $explode[3];
        $page_name = '';
        if ($page_id == 1){
            $page_name = 'كلمة المدير';
        }
        else if ($page_id == 2){
            $page_name = "الرسالة و الرؤية";
        }
        else if ($page_id == 3){
            $page_name = "الهيكل التنظيمي";
        }
        else if ($page_id == 4){
            $page_name = "حقوق المستخدمين";
        }
        $specialpages = SpecialPages::where('category_id', '=', $page_id)->first();
        $corp_name = BasicInfo::first();
        return view('backend.specialpages.special_pages', compact('page_name', 'specialpages', 'corp_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(SpecialPagesRequest $request)
    {
        $specialpages = new SpecialPages;
        $specialpages->title = $request->input('title');
        $specialpages->subject = $request->input('subject');
        $url = $_SERVER['REQUEST_URI'];
        $explode = explode('/', $url);
        $page_id = $explode[3];
        $specialpages->category_id = $page_id;
        $page_name = '';
        if ($page_id == 1){
            if (empty($request->input('page_title'))){
                $page_name = 'كلمة المدير';
                $specialpages->page_title = $page_name;
            }
            else{
               $page_name = $request->input('page_title');
               $specialpages->page_title = $page_name;
            }
        }
        else if ($page_id == 2){
            $page_name = "الرسالة و الرؤية";
            $specialpages->page_title = $page_name;
        }
        else if ($page_id == 3){
            $page_name = "الهيكل التنظيمي";
            $specialpages->page_title = $page_name;
        }
        else if ($page_id == 4){
            if (empty($request->input('page_title'))){
                $page_name = 'حقوق المستخدمين';
                $specialpages->page_title = $page_name;
            }
            else{
               $page_name = $request->input('page_title');
               $specialpages->page_title = $page_name;
            }
        }
        $specialpages->save();
        Flash::success("تم الحفظ بنجاح");
        return redirect('admin/specialpages/'.$page_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $url = $_SERVER['REQUEST_URI'];
        $explode = explode('/', $url);
        $page_id = $explode[2];
        $specialpages = SpecialPages::where('category_id', '=', $page_id)->first();
        $pages = Page::all();
        $content = BasicInfo::first();
        $social = SocialMedia::all();
        return view('frontend.specialpages.viewspecialpages', compact('social', 'specialpages', 'page_id', 'pages', 'content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $url = $_SERVER['REQUEST_URI'];
        $explode = explode('/', $url);
        $page_id = $explode[3];
        $page_name = '';
        if ($page_id == 1){
            $page_name = 'كلمة المدير';
        }
        else if ($page_id == 2){
            $page_name = "الرسالة و الرؤية";
        }
        else if ($page_id == 3){
            $page_name = "الهيكل التنظيمي";
        }
        else if ($page_id == 4){
            $page_name = "حقوق المرضى";
        }
        $specialpages = SpecialPages::where('category_id', '=', $page_id)->first();
        $record_id = $specialpages[0]['attributes']['id'];
        $corp_name = BasicInfo::first();
        return view('backend.specialpages.special_pages_edit', compact('specialpages', 'page_name', 'record_id', 'corp_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(SpecialPagesRequest $request)
    {
        $url = $_SERVER['REQUEST_URI'];
        $explode = explode('/', $url);
        $page_id = $explode[3];
        $specialpages = SpecialPages::where('category_id', '=', $page_id)->first();
        $specialpages->title = $request->input('title');
        $specialpages->subject = $request->input('subject');        
        $page_name = '';
        if ($page_id == 1){
            if (empty($request->input('page_title'))){
                $page_name = 'كلمة المدير';
                $specialpages->page_title = $page_name;
            }
            else{
               $page_name = $request->input('page_title');
               $specialpages->page_title = $page_name;
            }
        }
        $specialpages->update();
        Flash::success("تم التعديل بنجاح");
        return redirect('admin/specialpages/'.$page_id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
