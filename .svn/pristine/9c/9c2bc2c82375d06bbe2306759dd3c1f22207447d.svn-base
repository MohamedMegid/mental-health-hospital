<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News;
use App\NewsImages;
use App\Comments;

use App\Http\Requests\NewsRequest;
use App\Http\Requests\EditNewsRequest;
use App\Http\Requests\GeneralRequest;
use App\Http\Requests\CommentsRequest;
use App\BasicInfo;

use Laracasts\Flash\Flash;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = News::paginate(10);
        $deactive = Comments::where('status', '=', '2')->first();
        $corp_name = BasicInfo::first();
        return view('backend.comments.comments_list', compact('news', 'deactive', 'corp_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $news_id = $tokens[3];
        $news = News::where('id', '=', $news_id)->paginate(1);
        $deactive = Comments::where('news_id', '=', $news_id)->where('status', '=', '2')->first();
        $corp_name = BasicInfo::first();
        return view('backend.comments.comments_list', compact('news', 'deactive', 'corp_name'));
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CommentsRequest $request)
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $news_id = $tokens[2];
        $comments = new Comments;
        $comments->comment = $request->input('comment');
        $comments->news_id = $news_id;
        $comments->status = 2;
        $comments->save();
        return redirect('news/'. $news_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $comments = Comments::find($id);
        $corp_name = BasicInfo::first();
        return view('backend.comments.delete_comments', compact('comments', 'corp_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function edit(GeneralRequest $request)
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $news_id = $tokens[3];
        if($request->input('active')){
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $comments_id) {
                    $comments = Comments::find($comments_id);
                    $comments->status = 1;
                    $comments->update();
                }
                Flash::success('تم التفعيل بنجاح');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
            }
            return redirect('admin/comments/' . $news_id);
        }
        else if($request->input('search')){
            $activation = $request->input('activation');
            return redirect('admin/comments/' . $news_id . '?activation='. $activation);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(GeneralRequest $request)
    {
        if($request->input('active')){
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $comments_id) {
                    $comments = Comments::find($comments_id);
                    $comments->status = 1;
                    $comments->update();
                }
                Flash::success('تم التفعيل بنجاح');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
            }
            return redirect('admin/comments');
        }
        else if($request->input('search')){
            $activation = $request->input('activation');
            return redirect('admin/comments?activation='. $activation);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $comments = Comments::find($id);
        $comments->delete();
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/comments');
    }
}
