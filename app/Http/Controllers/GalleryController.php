<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralRequest;
use App\Http\Requests\PGalleryRequest;

use App\PGalleryImages;
use App\PGallery;

use App\Http\Requests\BasicInfoRequest;
use App\Page;
use App\BasicInfo;
use App\SocialMedia;
use Laracasts\Flash\Flash;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $albums = PGallery::paginate(15);
        $images = PGalleryImages::all();
        $corp_name = BasicInfo::first();
        return view('backend.photo_gallery.pgallery_list', compact('albums', 'images', 'corp_name'));
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
                return redirect('admin/pgallery/list/all/' . $views . '/delete');
            }
            else{
                Flash::warning('لم يتم الاختيار', 'alert-class');
            }
            return redirect('admin/pgallery/list');
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
        return view('backend.photo_gallery.multiple_upload', compact('corp_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PGalleryRequest $request)
    {
        $album = new PGallery;
        $album->name = $request->input('name');
        $album->save();
        $multi_file = $request->file('files');
        foreach ($multi_file as $image) {
            $images = new PGalleryImages;

            $myalbum = PGallery::orderBy('id', 'desc')->first();
            $last_album_id = $myalbum->id;
            $images->pgallery_id = $last_album_id;

            if(!empty($image)){
                $images->images = $image->getClientOriginalName();

                $file = $image->move('img/uploaded/pgallery', $image->getClientOriginalName());

                $images->save();
            }
        }
        Flash::success('تم الحفظ بنجاح');
        return redirect('admin/pgallery/create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $albums = PGallery::find($id);
        $images = PGalleryImages::where('pgallery_id', '=', $id)->get();
        $corp_name = BasicInfo::first();
        return view('backend.photo_gallery.edit_albums', compact('albums', 'images', 'corp_name'));
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
        $albums = PGallery::find($id);
        if (empty($request->input('name'))){
            Flash::warning('الحقل اسم الالبوم ضروري لاتمام عملية الحفظ', 'alert-class');
            return redirect('admin/pgallery/'. $id . '/edit');
        }
        $albums->name = $request->input('name');
        $albums->update();
        $news_id = $id;
        Flash::success("تم التعديل بنجاح");
        return redirect('admin/pgallery/'. $id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $albums = PGallery::find($id);
        $corp_name = BasicInfo::first();
        return view('backend.photo_gallery.delete_albums', compact('albums', 'corp_name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $albums = PGallery::find($id);
        $album_id = $albums['attributes']['id'];
        $albums->delete();
        $albums_images = PGalleryImages::where('pgallery_id', '=', $album_id)->delete();
        Flash::success("تم الحذف بنجاح");
        return redirect('admin/pgallery/list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function albums_list(){
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        if (!empty($tokens[2])){
            $images = PGalleryImages::where('pgallery_id', '=', $tokens[2])->get();
            $myalbum = PGallery::where('id', '=', $tokens[2])->first();
            $page_title = $myalbum['attributes']['name'];
        }
        else{
            $images = PGalleryImages::all();
            $page_title = 'استعراض الالبومات';
        }
        $albums = PGallery::all();//with('photos')->get();
        $pages = Page::all();
        $content = BasicInfo::first();
        $social = SocialMedia::all();
        return view('frontend.pgallery.albums_list', compact('social', 'albums', 'images', 'pages', 'content', 'page_title'));
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
        $album_id = $tokens[3];
        if (!empty($multi_file)){
            foreach ($multi_file as $image) {
                $images = new PGalleryImages;
                $images->pgallery_id = $album_id;
                if(!empty($image)){
                    $images->images = $image->getClientOriginalName();
                    $file = $image->move('img/uploaded/pgallery', $image->getClientOriginalName());
                    $images->save();
                }
            }
        }
        Flash::success("تم الحفظ بنجاح");
        return redirect('admin/pgallery/'. $album_id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy_images($album_id, $id)
    {
        $image = PGalleryImages::find($id);
        $image->delete();
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
                $albums = PGallery::find($value);
                $album_id = $albums['attributes']['id'];
                $albums->delete();
                $albums_images = PGalleryImages::where('pgallery_id', '=', $album_id)->delete();
               Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/pgallery/list');
    }
}
