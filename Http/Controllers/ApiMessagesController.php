<?php

namespace App\Http\Controllers;

use App\Attachment;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Dentist;
use App\Event;
use Carbon\Carbon;
use App\Message;
use Lexx\ChatMessenger\Models\Participant;
use Lexx\ChatMessenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use DB;

class ApiMessagesController extends Controller
{
    public function getThreadId(Request $request)
    {
        $query='SELECT x.* FROM lexx_participants x left join lexx_participants y on x.thread_id=y.thread_id where x.user_id='.$request->input('c').' and x.type=2 and y.user_id='.$request->input('d').' and y.type=1';
        $res=DB::select($query);

        if (isset($res[0])) {
            $data['threadId']=$res[0]->thread_id;
            return response()->json(['data'=>$data,'success'=>'true','messages'=>'']);
        }

        return response()->json(['success'=>'false','messages'=>'not found']);
    }

    public function indexC(Request $request)
    {
        $threads =array();
        $thread="";
        $data=array();




        $threads = Thread::forUser($request->user()->id)->latest('updated_at')->get();
        if (count($threads)>0) {
            $i=0;
            foreach ($threads as $k=> $thread) {
                $par=Participant::where('thread_id', $thread->id)->where('type', 1)->first();

                if ($par) {
                    $client=Dentist::find($par->user_id);
                    $mess=Message::where('thread_id', $thread->id)->orderby('id', 'desc')->first();

                    if (null !== $mess) {
                        $data['clients'][$i] = DB::table('dentists')->select('profile_photo', 'hospital_name_ar', 'hospital_name_en')
                        ->leftjoin('hospitals', 'dentists.hospital', 'hospitals.id')->where('dentists.id', $par->user_id)->first();
                        $data['clients'][$i]->threadId=$thread->id;
                        $data['clients'][$i]->name=$client->name;
                        $data['clients'][$i]->created_at= Carbon::parse($mess->created_at)->format('Y-m-d H:i:s');
                        $data['clients'][$i]->lstMessage=$mess->body;
                        $i++;
                    }
                }
                $thread->markAsRead($request->user()->id);
            }

            return response()->json(['data'=>$data,'success'=>'true','messages'=>'']);
        }
        return response()->json(['data'=>$data,'success'=>'fasle','message'=>'Not Messages']);

        // return view('messenger.index', compact('threads','mess','thread', 'users'));
    }

    public function indexD(Request $request)
    {
        $threads =array();
        $thread="";
        $data=array();


        $threads = Thread::forUser($request->user()->id)->latest('updated_at')->get();

        if (count($threads)>0) {
            $i = 0;
            foreach ($threads as $k=> $thread) {
                $par=Participant::where('thread_id', $thread->id)->where('type', 1)->first();

                $clients=Participant::where('thread_id', $thread->id)->where('type', 2)->first();
                $client=User::find($clients->user_id);
                $mess=Message::where('thread_id', $thread->id)->orderby('id', 'desc')->first();
                if (null !== $mess) {
                    $data['clients'][$i] = DB::table('dentists')->select('hospital_name_ar', 'hospital_name_en')
                    ->leftjoin('hospitals', 'dentists.hospital', 'hospitals.id')->groupBy('dentists.id')->where('dentists.id', $par->user_id)->first();
                    $data['clients'][$i]->threadId=$thread->id;
                    $data['clients'][$i]->name=$client->name;
                    $data['clients'][$i]->created_at= Carbon::parse($mess->created_at)->format('Y-m-d H:i:s');
                    $data['clients'][$i]->lstMessage=$mess->body;
                    $i++;
                }
                $thread->markAsRead($request->user()->id);
            }

            return response()->json(['data'=>$data,'success'=>'true','messages'=>'']);
        }
        return response()->json(['data'=>$data,'success'=>'fasle','message'=>'Not Messages']);

        // return view('messenger.index', compact('threads','mess','thread', 'users'));
    }

    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id, Request $request)
    {
        $thread = Thread::find($id);
        if ($thread) {
            $thread->markAsRead($request->user()->id);
            $request->input('indexpage')?$indexpage= $request->input('indexpage'):$indexpage=10;
            $data= Message::select('id', 'body', 'created_at', 'type', 'user_id','file')->where('thread_id', $id)->orderby('id', 'desc')->with('attachments')->paginate($indexpage);

            if (count($data)>0) {
                foreach ($data as $m) {
                    if ($m->type==1) {
                        $m->name=dentist::find($m->user_id)->name;
                    } elseif ($m->type==2) {
                        $m->name=user::find($m->user_id)->name;
                    }
                }
            }

            return response()->json(['data'=>$data,'success'=>'true','messages'=>'']);
        } else {
            return response()->json(['data'=>$data,'success'=>'fasle','message'=>'Not Found Thread']);
        }
    }

    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        $users = User::where('id', '!=', Auth::guard('client')->user()->id)->get();

        return view('messenger.create', compact('users'));
    }

    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store()
    {
        $input = Input::all();

        $thread = Thread::create([
            'subject' => $input['subject'],
        ]);

        // Message
        $message = Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::guard('client')->user()->id,
            'body' => $input['message'],
        ]);

        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::guard('client')->user()->id,
            'last_read' => new Carbon,
        ]);

        // Recipients
        if (Input::has('recipients')) {
            // add code logic here to check if a thread has max participants set
            // utilize either $thread->getMaxParticipants()  or $thread->hasMaxParticipants()

            $thread->addParticipant($input['recipients']);
        }

        // check if pusher is allowed
        if (config('chatmessenger.use_pusher')) {
            $this->oooPushIt($message);
        }

        if (request()->ajax()) {
            return response()->json([
                'status' => 'OK',
                'message' => $message,
                'thread' => $thread,
            ]);
        }

        return redirect()->route('messages');
    }

    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id, Request $request)
    {
        $thread = Thread::find($id);
        if ($thread) {
            $user_id=$request->user()->id;
            if (isset($request->user()->hospital)) {
                $type=1;
            } else {
                $type=2;
            }
            
            //dd($request->message_body);
            if(request('file') == 1){
            $name = date('His').$request->message_body->getClientOriginalName();
        $path = url('/').'/'.'attachments/'.$name;
        $request->message_body->move(public_path('/attachments'), $name);

            $message = Message::create([
            'thread_id' => $thread->id,
            'user_id' => $user_id,
            'type'=>$type,
            'device_id'=>$request->device_id,
            'body' =>$path,
            'file' => request('file')
        ]);
            }else{
                $message = Message::create([
            'thread_id' => $thread->id,
            'user_id' => $user_id,
            'type'=>$type,
            'device_id'=>$request->device_id,
            'body' => Input::get('message_body'),
            'file' => request('file')
        ]);
            }

            //if(!$request->user()->isOnline()){
            //echo $thread->id;
            if (isset($request->user()->hospital)) {
                $data_user = Message::where('thread_id', $thread->id)->where('type', 2)->get()->first();
                $data = Event::where('user_id', $data_user->user_id)->get()->first();
                //	  dd($data);
                $token=$data->device_id;
            } else {
                $data_user = Message::where('thread_id', $thread->id)->where('type', 1)->get()->first();
                $datax = Dentist::where('id', $data_user->user_id)->get()->first();
                //	   dd($data);
                $token=$datax->device_id;
            }


            if ($request->user()->language == 'ar') {
                $body = 'لديك رسالة على الخاص ';
            } else {
                $body = 'You have new message';
            }

            $notification = [
        'body' => $body,
        ];
            $extraNotificationData = ["message" => $notification];

            $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            'notification' => $notification,
            'data' => $extraNotificationData
        ];

            $headers = [
            'Authorization: key=' . env('FCM_API_ACCESS_KEY'),
            'Content-Type: application/json'
        ];


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, env('FCM_URL'));
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
            $result = curl_exec($ch);
            curl_close($ch);
            // }
            // echo $result;
            // Add replier as a participant
            $participant = Participant::firstOrCreate([
            'thread_id' => $thread->id,
            'user_id' =>  $user_id,
            'type'=>$type
        ]);
            $participant->last_read = new Carbon;
            $participant->save();



            $user=$request->user();
            $message->name=$user->name;
            $data=$message;
            unset($data['thread']);
            return response()->json(['data'=>$data,'success'=>'true','messages'=>'']);
        } else {
            return response()->json(['data'=>$data,'success'=>'fasle','message'=>'Not Found Thread']);
        }
    }


    /**
     * Send the new message to Pusher in order to notify users.
     *
     * @param Message $message
     */

    /**
     * Mark a specific thread as read, for ajax use.
     *
     * @param $id
     */
    public function read($id)
    {
        $thread = Thread::find($id);
        if (!$thread) {
            abort(404);
        }
        if (isset(Auth::guard('client')->user()->id)) {
            $ids =Auth::guard('client')->user()->id;
        } elseif (isset(Auth::guard('dentist')->user()->id)) {
            $ids = Auth::guard('dentist')->user()->id;
        }
        $thread->markAsRead($ids);
    }

    /**
     * Get the number of unread threads, for ajax use.
     *
     * @return array
     */
    public function unread()
    {
        $count = request()->user()->unreadMessagesCount();


        return ['msg_count' => $count];
    }


    public function attach_file(Request $request)
    {
        $this->validate(
            $request,
            [
                'file' => 'required',
                'message_id' => 'required',
            ]
        );

        $name = date('His').$request->file->getClientOriginalName();
        $path = url('/').'/'.'attachments/'.$name;
        $request->file->move(public_path('/attachments'), $name);

        $attach =  Attachment::create(['path' => $path, 'message_id' => $request->message_id]);

        if ($attach) {
            return response()->json(['status' => 1, 'path' =>  $path]);
        }

        return response()->json(['status' => 0, 'message' =>  'error']);
    }
}
