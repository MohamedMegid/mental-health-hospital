<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\VGalleryRequest;
use App\Http\Requests\VGalleryAlbumsRequest;
use App\Http\Requests\GeneralRequest;

use App\VGalleryAlbums;
use App\VGallery;

use App\Http\Requests\BasicInfoRequest;
use App\Page;
use App\BasicInfo;
use App\SocialMedia;
use Laracasts\Flash\Flash;

class VGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $albums = VGalleryAlbums::paginate(15);
        $corp_name = BasicInfo::first();
        return view('backend.vgallery.vgallery_list', compact('albums', 'corp_name'));
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
                foreach($_POST['check_list'] as $view_id) {
                    $views .= $view_id . '-';
                }
                return redirect('admin/vgallery/list/all/' . $views . '/delete');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
            }
            return redirect('admin/vgallery/list');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create_album()
    {
        $corp_name = BasicInfo::first();
        return view('backend.vgallery.create_album', compact('corp_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store_album(VGalleryAlbumsRequest $request)
    {
        $album = new VGalleryAlbums;
        $album->name = $request->input('name');
        $album->save();
        Flash::success('تم الحفظ بنجاح');
        return redirect('admin/vgallery/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $albums = VGalleryAlbums::all();
        $corp_name = BasicInfo::first();
        return view('backend.vgallery.videos_form', compact('albums', 'corp_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(VGalleryRequest $request)
    {
        $videos = new VGallery;
        $videos->name = $request->input('name');
        $videos->link = $request->input('link');
        $videos->summary = $request->input('summary');
        $videos->vgallery_id = $request->input('vgallery_id');
        $videos->save();
        Flash::success('تم الحفظ بنجاح');
        return redirect('admin/vgallery/create');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $albums = VGalleryAlbums::find($id);
        $videos = VGallery::where('vgallery_id', '=', $id)->get();
        $corp_name = BasicInfo::first();
        return view('backend.vgallery.edit_albums', compact('albums', 'videos', 'corp_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(GeneralRequest $request, $id)
    {
        if($request->input('edit')) {
            if (empty($request->input('name'))) {
                Flash::warning('ادخال الحقل اسم الالبوم ضروري لاتمام عملية التعديل', 'alert-class');
                return redirect('admin/vgallery/' . $id . '/edit');
            }
            $album = VGalleryAlbums::find($id);
            $album->name = $request->input('name');
            $album->update();
            Flash::success('تم التعديل بنجاح');
        }
        $views = '';
        if($request->input('delete')) {      
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $view_id) {
                    $views .= $view_id . '-';
                }
                return redirect('admin/vgallery/video/' . $views . '/delete');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
            }
        }
        return redirect('admin/vgallery/' . $id . '/edit');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit_video($id)
    {
        $albums = VGalleryAlbums::all();
        $videos = VGallery::find($id);
        $corp_name = BasicInfo::first();
        return view('backend.vgallery.edit_videos', compact('videos', 'albums', 'corp_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update_video(VGalleryRequest $request, $id)
    {
        $video = VGallery::find($id);
        $video->name = $request->input('name');
        $video->link = $request->input('link');
        $video->summary = $request->input('summary');
        $video->vgallery_id = $request->input('vgallery_id');
        $video->update();
        Flash::success('تم التعديل بنجاح');
        return redirect('admin/vgallery/video/' . $id . '/edit');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $albums = VGalleryAlbums::find($id);
        $corp_name = BasicInfo::first();
        return view('backend.vgallery.delete_albums', compact('albums', 'corp_name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $album = VGalleryAlbums::find($id);
        $album->delete();
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/vgallery/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show_video($id)
    {
        $video = VGallery::find($id);
        $corp_name = BasicInfo::first();
        return view('backend.vgallery.delete_videos', compact('video', 'corp_name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy_video($id)
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $video_id = $tokens[4];
        $explode = explode('-', $video_id);
        foreach($explode as $key => $value) {
            if(!empty($value)){
                VGallery::where('vgallery_id', '=', $value)->delete();
            }
        }
        $video = VGallery::where('vgallery_id', '=', $value)->first();
        $album_id = $video['attributes']['vgallery_id'];
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/vgallery/6/edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function albums_list(){
        $albums = VGalleryAlbums::paginate(3);
        $videos = VGallery::all();
        $pages = Page::all();
        $content = BasicInfo::first();
        $social = SocialMedia::all();
        return view('frontend.vgallery.albums_list', compact('social', 'albums', 'videos', 'pages', 'content'));
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
                $albums = VGalleryAlbums::find($value);
                $albums->delete();
                $albums_videos = VGallery::where('vgallery_id', '=', $value)->delete();
               Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/vgallery/list');
    }
}
