<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ContactUs;
use App\ContactInfo;
use App\Gmap;
use App\ContactUsPhone;
use App\Http\Requests\ContactUsRequest;

use App\Http\Requests\BasicInfoRequest;
use App\Page;
use App\BasicInfo;
use App\SocialMedia;

use Laracasts\Flash\Flash;

class ContactUsFrontEndController extends Controller
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
        $gmap = Gmap::all();
        $contact_info = ContactInfo::all();
        $contact_id = $contact_info[0]['attributes']['id'];
        $phones = ContactUsPhone::where('contact_id', '=', $contact_id)->get();
        $pages = Page::all();
        $content = BasicInfo::first();
        $social = SocialMedia::all();
        return view('frontend.contactus.contactuspage', compact('social', 'gmap', 'contact_info', 'phones', 'pages', 'content'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ContactUsRequest $request)
    {
        $contact_us = new ContactUs;
        $contact_us->create($request->all());
        Flash::success("تم ارسال الرسالة بنجاح");
        return redirect('contact-us');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
