<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\auth\RegisterRequest;
use App\Http\Requests\EditRegisterDoctorRequest;
use App\Http\Requests\BasicInfoRequest;

use Auth;

use App\Banner;
use App\SocialMedia;
use App\FriendlySites;
use App\News;
use App\NewsImages;
use App\VGallery;
use App\PGalleryImages;
use App\Page;
use App\User;
use App\ContactUs;
use App\VGalleryAlbums;
use App\PGallery;
use App\Comments;
use App\BasicInfo;


use Input;
use Request as MyRequest;

use Laracasts\Flash\Flash;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $all_banners = Banner::take(2)->get();
        $first_banner = Banner::where('position', '=', 1)->orderBy('id', 'desc')->first();
        if (!empty($first_banner)){
        $fid = $first_banner['attributes']['id'];
        $second_banner = Banner::where('position', '=', 1)->where('id', '!=', $fid)->orderBy('id', 'desc')->first();
        }
        if (!empty($second_banner)){
        $sid = $second_banner['attributes']['id'];
        $third_banner = Banner::where('position', '=', 1)->where('id', '!=', $fid)->where('id', '!=', $sid)->orderBy('id', 'desc')->first();
        }
        $social = SocialMedia::all();
        $sites = FriendlySites::all();
        $news = News::where('importance', '=', 1)->get();
        $last_news = News::orderBy('created_at', 'desc')->first();
        $last_photo = PGalleryImages::orderBy('created_at', 'desc')->take(5)->get();
        $last_video = VGallery::orderBy('created_at', 'desc')->take(3)->get();
        $pages = Page::all();
        $content = BasicInfo::first();
        $banners = Banner::where('position', '=', 2)->get();
        $mylatest_news = News::orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.home', compact('second_banner', 'first_banner', 'third_banner', 'social', 'sites', 'news', 'last_news', 'last_video', 'last_photo', 'pages', 'content', 'banners', 'mylatest_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::where('role_id', '!=', 1)->get();
        $workers_users = User::where('role_id', '=', 2)->get();
        $news = News::all();
        $edu = News::where('category_id', '=', 2)->get();
        $ach = News::where('category_id', '=', 3)->get();
        $messages = ContactUs::all();
        $valbums = VGalleryAlbums::all();
        $palbums = PGallery::all();
        $yesterday = date('Y/m/d', strtotime("-1 days"));
        $old_messages = ContactUs::where('created_at', '<', $yesterday)->get();
        $comments = Comments::all();
        $old_comments = Comments::where('created_at', '<', $yesterday)->get();
        $last_ten_news = News::orderBy('created_at', 'desc')->take(10)->get();
        $corp_name = BasicInfo::first();
        return view('backend.dashboard', compact('users', 'news', 'edu', 'ach', 'messages', 'valbums', 'palbums', 'old_messages', 'workers_users', 'last_ten_news', 'comments', 'old_comments', 'corp_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $pages = Page::all();
        $content = BasicInfo::first();
        $social = SocialMedia::all();
        return view('frontend.master', compact('content', 'pages', 'social'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        $user_id = Auth::user()->id;
        $admin_user = User::where('id', '=', $user_id)->first();
        $corp_name = BasicInfo::first();
        return view('backend.admin.edit_form', compact('admin_user', 'corp_name'));
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
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
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
            if ($request->input('password') == $request->input('password_confirmation')){
                $user->password = bcrypt($request->input('password'));
            }
            else{
                Flash::error('كلمة السر غير متابقة للتأكيد');
                return redirect('admin/edit/info');
            }
        }
        $user->update();
        Flash::success('تم التعديل بنجاح');

        return redirect('admin/edit/info');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit_master()
    {
        $content = BasicInfo::first();
        $corp_name = BasicInfo::first();
        return view('backend.master.edit_form', compact('content', 'corp_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update_master(BasicInfoRequest $request)
    {
        $content = BasicInfo::first();
        $file = $request->file('basic_photo');
        if (!empty($file)){
            $content->basic_photo = $file->getClientOriginalName();
            $file = $file->move('img/uploaded/logo/', $file->getClientOriginalName());
        }
        $file = $request->file('photo');
        if (!empty($file)){
            $content->photo = $file->getClientOriginalName();
            $file = $file->move('img/uploaded/logo/', $file->getClientOriginalName());
        }
        $content->title1 = $request->input('title1');
        $content->subject1 = $request->input('subject1');
        $content->title2 = $request->input('title2');
        $content->subject2 = $request->input('subject2');
        $content->title3 = $request->input('title3');
        $content->subject3 = $request->input('subject3');
        $content->title4 = $request->input('title4');
        $content->subject4 = $request->input('subject4');
        $content->update();
        Flash::success('تم التعديل بنجاح');
        return redirect('admin/edit/master');
    }
}
