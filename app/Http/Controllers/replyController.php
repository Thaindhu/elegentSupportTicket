<?php

namespace App\Http\Controllers;

use App\Models\ReplyComment;
use App\Models\SupportTicket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class replyController extends Controller
{
    public function store(Request $request)
    { 

        request()->validate([
            'reply'  => 'required',
        ]);

        $reply=$request->input('reply');
        $ReplyComment  = new ReplyComment();
        $ReplyComment->support_ticket=$request->input('postid');
        $ReplyComment->reply=$reply;
        $ReplyComment->created_at=Carbon::now()->toDateTimeString();

        $saved = $ReplyComment->save();
        if (!$saved) {
            App::abort(500, 'Error');
        } 

        $SupportTicket = SupportTicket::find($request->input('postid')); 
        $SupportTicket->status="Closed";
        $SupportTicket->update();
        
         $details = [
            'title' => 'Ticket Reply, Ref No:'. $SupportTicket->ref_no,
            'body' => $reply,
            'status'=>'Closed'
        ];
       
        Mail::to($SupportTicket->email)->send(new \App\Mail\ticketStatusMail($details));

        return Response()->json([
            "success" => true,
            "ref_no"=> $SupportTicket->ref_no
         ]); 

    } 
}
