<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News;
use App\NewsImages;
use App\Comments;
use App\HitsCounter;
use App\Doctor;

use App\Http\Requests\NewsRequest;
use App\Http\Requests\EditNewsRequest;
use App\Http\Requests\GeneralRequest;
use App\Http\Requests\CommentsRequest;

use App\Http\Requests\BasicInfoRequest;
use App\Page;
use App\BasicInfo;
use App\SocialMedia;
use Laracasts\Flash\Flash;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $query = News::select();
        if (!empty($_GET['title'])){
            $title = $_GET['title'];
            $query->where('title', 'LIKE', '%'.$title.'%');
        }
        if (!empty($_GET['importance'])){
            $importance = $_GET['importance'];
            $query->where('importance', '=', $importance);           
        }
        if (!empty($_GET['category'])){
            $category = $_GET['category'];
            $query->where('category_id', '=', $category);           
        }
        $news = $query->paginate(15);
        $corp_name = BasicInfo::first();
        return view('backend.news.news_list', compact('news', 'corp_name'));
    }

    /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations(GeneralRequest $request)
    {
        $news = '';
        if($request->input('delete')) {  
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $news_id) {
                    $news .= $news_id . '-';
                    
                    //$news = News::find($news_id);
                    //$news->delete();
                }
                return redirect('admin/news/all/' . $news . '/delete');
                //Flash::success('تم الحذف بنجاح');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
                return redirect('admin/news');
            }
            
        }
        else if($request->input('search')){
            $title = $request->input('title');
            $importance = $request->input('importance');
            $category = $request->input('category');
            return redirect('admin/news?title='. $title . '&importance='. $importance .'&category=' . $category);
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
        return view('backend.news.news_form', compact('corp_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(NewsRequest $request)
    {
        $news = new News;
        $news->title = $request->input('title');
        $news->summary = $request->input('summary');
        $news->subject = $request->input('subject');
        if ($request->input('importance') == 'checked'){
            $news->importance = 1;       
        }
        else{
            $news->importance = 2;
        }
        $file = $request->file('basic_photo');
        if (!empty($file)){
            $news->basic_photo = $file->getClientOriginalName();
            $file = $file->move('img/uploaded/', $file->getClientOriginalName());
        }
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $category_id = $tokens[4];
        $news->category_id = $category_id;
        $news->save();
        $multi_file = $request->file('files');
        foreach ($multi_file as $image) {
            $images = new NewsImages;

            $mynews = News::orderBy('id', 'desc')->first();
            $last_news_id = $mynews->id;
            $images->news_id = $last_news_id;

            if(!empty($image)){
                $images->images = $image->getClientOriginalName();

                $file = $image->move('img/uploaded/images', $image->getClientOriginalName());

                $images->save();
            }
        }
        Flash::success("تم الحفظ بنجاح");
        return redirect('admin/news/create/'.$category_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $news = News::find($id);
        $corp_name = BasicInfo::first();
        return view('backend.news.delete_news', compact('news', 'corp_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        $images = NewsImages::where('news_id', '=', $id)->get();
        $corp_name = BasicInfo::first();
        return view('backend.news.edit_news', compact('news', 'images', 'corp_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(EditNewsRequest $request, $id)
    {
        $news = News::find($id);
        $news->title = $request->input('title');
        $news->summary = $request->input('summary');
        $news->subject = $request->input('subject');
        if ($request->input('importance') == 'checked'){
            $news->importance = 1;       
        }
        else{
            $news->importance = 2;
        }
        $file = $request->file('basic_photo');
        if (!empty($file)){
            $news->basic_photo = $file->getClientOriginalName();
            $file = $file->move('img/uploaded/', $file->getClientOriginalName());
        }
        $news->update();

        $news_id = $id;
        /*
        $multi_file = $request->file('files');
        if (!empty($multi_file[0])){
            $images = NewsImages::where('news_id', '=', $news_id)->delete();
        }
        */
        /*
        
        */
        Flash::success("تم التعديل بنجاح");
        return redirect('admin/news/'. $id . '/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update_images(GeneralRequest $request){
        $multi_file = $request->file('files');
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $news_id = $tokens[3];
        if (!empty($multi_file)){
            foreach ($multi_file as $image) {
                $images = new NewsImages;
                $images->news_id = $news_id;
                if(!empty($image)){
                    $images->images = $image->getClientOriginalName();
                    $file = $image->move('img/uploaded/images', $image->getClientOriginalName());
                    $images->save();
                }
            }
        }
        Flash::success("تم الحفظ بنجاح");
        return redirect('admin/news/'. $news_id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy_images($news_id, $id)
    {
        $image = NewsImages::find($id);
        $image->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news_id = $news['attributes']['id'];
        $news->delete();
        $news_images = NewsImages::where('news_id', '=', $news_id)->delete();
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/news');
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
        $news = $tokens[4];
        $explode = explode('-', $news);
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                $news = News::find($value);
                $news->delete();
                $news_images = NewsImages::where('news_id', '=', $value)->delete();
                Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/news');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function news_list()
    {
        $news = News::where('category_id', '=', 1)->paginate(10);
        $educational_news = News::where('category_id', '=', 2)->orderBy('id', 'desc')->limit(6)->get();
        $achievements = News::where('category_id', '=', 3)->orderBy('id', 'desc')->limit(6)->get();
        $doctors = Doctor::orderByRaw("RAND()")->get();        
        $pages = Page::all();
        $content = BasicInfo::first();
        $social = SocialMedia::all();
        return view('frontend.news.news_list', compact('social', 'news', 'educational_news', 'achievements', 'doctors', 'pages', 'content'));
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function single_news()
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $news_id = $tokens[2];
        $v_news = News::find($news_id);
        $old_visits = $v_news->visits;   
        $new_visits = $old_visits + 1;
        $v_news->visits = $new_visits;
        $v_news->save();
        $news = News::with('news')->with('comments')->where('id', '=', $news_id)->get();
        $comments_count = Comments::where('news_id', '=', $news_id)->where('status', '=', 1)->get();
        $educational_news = News::where('category_id', '=', 2)->limit(6)->get();
        $achievements = News::where('category_id', '=', 3)->limit(6)->get();
        $doctors = Doctor::orderByRaw("RAND()")->get();        
        $pages = Page::all();
        $content = BasicInfo::first();
        $social = SocialMedia::all();
        return view('frontend.news.single-news', compact('social', 'news', 'comments_count', 'educational_news', 'achievements', 'doctors', 'pages', 'content'));
    }
}