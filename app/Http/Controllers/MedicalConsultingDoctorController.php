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

use App\Http\Requests\BasicInfoRequest;
use App\Page;
use App\BasicInfo;
use App\User;
use App\SocialMedia;
use Mail;
use Auth;

use Laracasts\Flash\Flash;

class MedicalConsultingDoctorController extends Controller
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
        $pages = Page::all();
        $content = BasicInfo::first();
        $social = SocialMedia::all();
        return view('frontend.med_consulting.viewconsulting', compact('social', 'med', 'reply', 'pages', 'content'));
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
        $pages = Page::all();
        $content = BasicInfo::first();
        $social = SocialMedia::all();
        return view('frontend.med_consulting.single_consulting', compact('social', 'med', 'reply', 'pages', 'content'));
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
                $message_reply = $request->input('reply_message');
                $reply->reply_message = $request->input('reply_message');
                $reply->med_id = $med_id;
                $reply->save();
                $i++;
                $user_id = Auth::user()->id;
                $user = User::where('id', '=', $user_id)->first();
                Mail::send('mail.medicalmessage', ['message_reply' => $message_reply], function ($m) use ($user) {
                    $m->to($user->email, $user->name)->subject('الرد على الرسالة!');
                });
            }
        }
        else{
            $reply = new MedReply;
            $message_reply = $request->input('reply_message');
            $reply->reply_message = $request->input('reply_message');
            $reply->med_id = $med_id;
            $reply->save();

            $user_id = Auth::user()->id;
                $user = User::where('id', '=', $user_id)->first();
                Mail::send('mail.medicalmessage', ['message_reply' => $message_reply], function ($m) use ($user) {
                    $m->to($user->email, $user->name)->subject('الرد على الرسالة!');
                });
        }
        Flash::success('تم الرد بنجاح');
        return redirect('doctor/med-consulting/consulting');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
