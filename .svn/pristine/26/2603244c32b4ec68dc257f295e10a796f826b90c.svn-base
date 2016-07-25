<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MedConsulting;
use App\MedInfo;
use App\MedReply;

use App\Http\Requests\MedConsultingRequest;
use App\Http\Requests\MedInfoRequest;
use App\Http\Requests\MedReplyRequest;
use App\Http\Requests\GeneralRequest;
use App\Http\Requests\BasicInfoRequest;
use App\Page;
use App\BasicInfo;
use App\SocialMedia;
use App\User;

use Mail;
use Auth;

use Laracasts\Flash\Flash;

class MedicalConsultingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $med = MedConsulting::paginate(20);
        $reply = MedReply::all();
        $corp_name = BasicInfo::first();
        return view('backend.med_consulting.viewconsulting', compact('med', 'reply', 'corp_name'));
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
                return redirect('admin/med-consulting/consulting/all/' . $contacts . '/delete');
            }
            if (empty($_POST['check_list'])){
                Flash::warning('لم يتم الاختيار', 'alert-class');
                return redirect('admin/med-consulting/consulting');
            }
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $med = MedInfo::first();
        $pages = Page::all();
        $content = BasicInfo::first();
        $social = SocialMedia::all();
        return view('frontend.medical_consulting.med_consulting', compact('social', 'med', 'pages', 'content'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(MedConsultingRequest $request)
    {
        $med_consulting = new MedConsulting;
        $med_consulting->create($request->all());
        Flash::success("تم ارسال الاستشارة بنجاح");
        return redirect('med-consulting');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $med = MedInfo::all();
        $corp_name = BasicInfo::first();
        return view('backend.med_consulting.info', compact('med', 'corp_name'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function save_info(MedInfoRequest $request)
    {
        $med_consulting = new MedInfo;
        $med_consulting->create($request->all());
        Flash::success("تم الحفظ بنجاح");
        return redirect('admin/med-consulting/info');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        $med = MedInfo::first();
        $corp_name = BasicInfo::first();
        return view('backend.med_consulting.info_edit', compact('med', 'corp_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(MedInfoRequest $request)
    {
        $med_consulting = MedInfo::first();
        $med_consulting->title = $request->input('title');
        $med_consulting->subject = $request->input('subject');
        $med_consulting->update();
        Flash::success('تم التعديل بنجاح');
        return redirect('admin/med-consulting/info/edit');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function single_consulting()
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $med_id = $tokens[4];
        $med = MedConsulting::find($med_id);
        $reply = MedReply::where('med_id', '=', $med_id)->get();
        $corp_name = BasicInfo::first();
        return view('backend.med_consulting.single_consulting', compact('med', 'reply', 'corp_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function reply_message(MedReplyRequest $request)
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $med_id = $tokens[4];

        if ($med_id == 'all'){
            $med = MedConsulting::all();
            $i = 0;
            foreach ($med as $key => $value) {
                $med_id = $med[$i]['attributes']['id'];
                $reply = new MedReply;
                $reply->reply_message = $request->input('reply_message');
                $reply->med_id = $med_id;
                $reply->save();
                $i++;
                $message_reply = $request->input('reply_message');
                $user_id = Auth::user()->id;
                $user = User::where('id', '=', $user_id)->first();
                Mail::send('mail.medicalmessage', ['message_reply' => $message_reply], function ($m) use ($user) {
                    $m->to($user->email, $user->name)->subject('الرد على الرسالة!');
                });
            }
        }
        else{
            $reply = new MedReply;
            $reply->reply_message = $request->input('reply_message');
            $reply->med_id = $med_id;
            $reply->save();
            $message_reply = $request->input('reply_message');
                $user_id = Auth::user()->id;
                $user = User::where('id', '=', $user_id)->first();
                Mail::send('mail.medicalmessage', ['message_reply' => $message_reply], function ($m) use ($user) {
                    $m->to($user->email, $user->name)->subject('الرد على الرسالة!');
                });
        }
        Flash::success('تم الرد بنجاح');
        return redirect('admin/med-consulting/consulting');
    }

     public function show_delete(){
        $corp_name = BasicInfo::first();
        return view('backend.med_consulting.delete_contacts', compact('corp_name'));
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
                $med = MedConsulting::find($value);
                $med->delete();
                Flash::success("تم الحذف بنجاح");
            }
        }
        return redirect('admin/med-consulting/consulting');
    }
}
