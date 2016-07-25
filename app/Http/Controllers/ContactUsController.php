<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gmap;
use App\ContactInfo;
use App\ContactUs;
use App\ContactusReply;
use App\ContactUsPhone;

use App\Http\Requests\ContactInfoRequest;
use App\Http\Requests\ContactusReplyRequest;
use App\Http\Requests\GmapRequest;
use App\Http\Requests\GeneralRequest;
use App\BasicInfo;
use App\User;

use Mail;
use Auth;

use Laracasts\Flash\Flash;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $url = $tokens[3];
        if ($url == 'contacts_replied'){
            $contacts = ContactUs::where('reply_status', '=', 1)->paginate(20);
            $table_name = 'استعراض رسائل اتصل بنا التي تم الرد عليها';
        }
        if ($url == 'contacts'){
            $contacts = ContactUs::where('reply_status', '=', 2)->paginate(20);
            $table_name = 'استعراض رسائل اتصل بنا التي لم يتم الرد عليها';
        }
        $reply = ContactusReply::all();
        $corp_name = BasicInfo::first();
        return view('backend.contactus.viewcontactus', compact('contacts', 'reply', 'table_name', 'corp_name'));
    }

    /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations(GeneralRequest $request)
    {
        $contacts = '';
        if($request->input('delete')) {
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $contacts_id) {
                    $contacts .= $contacts_id . '-';
                }
                return redirect('admin/contact-us/contacts/all/' . $contacts . '/delete');
            }
            if (empty($_POST['check_list'])){
                Flash::warning('لم يتم الاختيار', 'alert-class');
                return redirect('admin/contact-us/contacts');
            }
            
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index_replied()
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $url = $tokens[3];
        if ($url == 'contacts-replied'){
            $contacts = ContactUs::where('reply_status', '=', 1)->paginate(20);
            $table_name = 'استعراض رسائل اتصل بنا التي تم الرد عليها';
        }
        if ($url == 'contacts'){
            $contacts = ContactUs::where('reply_status', '=', 2)->paginate(20);
            $table_name = 'استعراض رسائل اتصل بنا التي لم يتم الرد عليها';
        }
        $reply = ContactusReply::all();
        $corp_name = BasicInfo::first();
        return view('backend.contactus.viewcontactus', compact('contacts', 'reply', 'table_name', 'corp_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $contact = ContactInfo::all();
        $corp_name = BasicInfo::first();
        return view('backend.contactus.contact_info_form', compact('contact', 'corp_name'));
    }

    /* Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function save(ContactInfoRequest $request)
    {
        $contact = new ContactInfo;
        $contact->title = $request->input('title');
        $contact->mail = $request->input('mail');
        $count = $request->input('counter');
        $contact->save();
        $contact_info = ContactInfo::first(['id']);
        $last_contact_id = $contact_info['attributes']['id'];
        for ($i=1; $i <= $count; $i++) {
            $contact_phone = new ContactUsPhone; 
            $input_name = "phone" . $i;
            $contact_phone->phone = $request->input($input_name);
            $contact_phone->contact_id = $last_contact_id;
            $contact_phone->counter = $i;
            if (!empty($request->input($input_name))){
                $contact_phone->save();
            }
        }        
        Flash::success('تم الحفظ بنجاح');
        return redirect('admin/contact-us/cont-info/edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(GmapRequest $request)
    {
        $gmap = new Gmap;
        $gmap->address = $request->input('address');
        $gmap->latitude = $request->input('latitude');
        $gmap->longitude = $request->input('longitude');
        $gmap->save();
        Flash::success('تم الحفظ بنجاح');
        return redirect('admin/contact-us/gmap/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $gmap = Gmap::all();
        $corp_name = BasicInfo::first();
        return view('backend.contactus.gmap', compact('gmap', 'corp_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        $gmap = Gmap::all();
        $corp_name = BasicInfo::first();
        return view('backend.contactus.gmap-edit', compact('gmap', 'corp_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(GmapRequest $request)
    {
        $gmap = Gmap::first();
        $gmap->address = $request->input('address');
        $gmap->latitude = $request->input('latitude');
        $gmap->longitude = $request->input('longitude');
        $gmap->update();
        Flash::success('تم التعديل بنجاح');
        return redirect('admin/contact-us/gmap/edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit_contact_info()
    {
        $contact = ContactInfo::first();
        $contact_id = $contact['attributes']['id'];
        $phones = ContactUsPhone::where('contact_id', '=', $contact_id)->get();
        $corp_name = BasicInfo::first();
        return view('backend.contactus.contact_info_edit', compact('contact', 'phones', 'corp_name'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update_contact_info(ContactInfoRequest $request)
    {
        $contact = ContactInfo::first();
        $contact->title = $request->title;
        $contact->mail = $request->input('mail');
        $count = $request->input('counter');
        $contact->update();
        $contact_id = $contact['attributes']['id'];
        $phones = ContactUsPhone::where('contact_id', '=', $contact_id)->get();
        ContactUsPhone::where('contact_id', '=', $contact_id)->delete();
        
        $contact_info = ContactInfo::first(['id']);
        $last_contact_id = $contact_info['attributes']['id'];
        for ($i=1; $i <= $count; $i++) {
            $contact_phone = new ContactUsPhone; 
            $input_name = "phone" . $i;
            $contact_phone->phone = $request->input($input_name);
            $contact_phone->contact_id = $last_contact_id;
            $contact_phone->counter = $i;
            if (!empty($request->input($input_name))){
                $contact_phone->save();
            }
        }
        Flash::success('تم التعديل بنجاح');
        return redirect('admin/contact-us/cont-info/edit');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function single_contact()
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $contact_id = $tokens[4];
        $contact = ContactUs::find($contact_id);
        $reply = ContactusReply::where('contact_id', '=', $contact_id)->get();
        $corp_name = BasicInfo::first();
        return view('backend.contactus.single_contact', compact('contact', 'reply', 'corp_name'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function reply_message(ContactusReplyRequest $request)
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $contact_id = $tokens[4];

        if ($contact_id == 'all'){
            $contacts = ContactUs::all();
            $i = 0;
            foreach ($contacts as $key => $value) {
                $contact_id = $contacts[$i]['attributes']['id'];
                $contact = ContactUs::find($contact_id);
                $contact->reply_status = 1;
                $reply = new ContactusReply;
                $message_reply = $request->input('reply_message');
                $reply->reply_message = $request->input('reply_message');
                $reply->contact_id = $contact_id;
                $reply->save();
                $contact->update();
                $i++;
                $user_id = Auth::user()->id;
                $user = User::where('id', '=', $user_id)->first();
                Mail::send('mail.contact', ['message_reply' => $message_reply], function ($m) use ($user) {
                    $m->to($user->email, $user->name)->subject('الرد على الرسالة!');
                });
            }
        }
        else{
            $contact = ContactUs::find($contact_id);
            $contact->reply_status = 1;
            $contact->update();
            $reply = new ContactusReply;
            $message_reply = $request->input('reply_message');
            $reply->reply_message = $request->input('reply_message');
            $reply->contact_id = $contact_id;
            $reply->save();

            $user_id = Auth::user()->id;
                $user = User::where('id', '=', $user_id)->first();
                Mail::send('mail.contact', ['message_reply' => $message_reply], function ($m) use ($user) {
                    $m->to($user->email, $user->name)->subject('الرد على الرسالة!');
                });
        }
        Flash::success('تم الرد بنجاح');
        return redirect('admin/contact-us/contacts');
    }

    public function show_delete(){
        $corp_name = BasicInfo::first();
        return view('backend.contactus.delete_contacts', compact('corp_name'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $contacts = $tokens[5];
        $explode = explode('-', $contacts);
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                $contacts = ContactUs::find($value);
                $contacts->delete();
                Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/contact-us/contacts');
    }


    /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations_replied(GeneralRequest $request)
    {
        $contacts = '';
        if($request->input('delete')) {
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $contacts_id) {
                    $contacts .= $contacts_id . '-';
                }
                return redirect('admin/contact-us/contacts-replied/all/' . $contacts . '/delete');
            }
            if (empty($_POST['check_list'])){
                Flash::warning('لم يتم الاختيار', 'alert-class');
                return redirect('admin/contact-us/contacts-replied');
            }
            
        }
    }

     public function show_delete_replied(){
        $corp_name = BasicInfo::first();
        return view('backend.contactus.delete_contacts_replied', compact('corp_name'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy_replied()
    {
        
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $contacts = $tokens[5];
        $explode = explode('-', $contacts);
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                $contacts = ContactUs::find($value);
                $contacts->delete();
                Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/contact-us/contacts-replied');
    }
}
