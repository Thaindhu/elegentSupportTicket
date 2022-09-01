<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class supportTicketController extends Controller
{
    public function index($id)
    {   //isView true pass
        $SupportTicket = SupportTicket::find($id);
        $SupportTicket->isView = true;
        $SupportTicket->status = "Open";
        $updated = $SupportTicket->update();
        if (!$updated) {
            App::abort(500, 'Error');
        }
        return view("pages/viewticket", [
            "posts" => $id,
            "customer_name" => $SupportTicket->customer_name,
            "description" => $SupportTicket->problem_description,
            "email" => $SupportTicket->email,
            "phone_number" => $SupportTicket->phone_number,
            "ref_no" => $SupportTicket->ref_no
        ]);
    }

    public function store(Request $request)
    {

        request()->validate([
            'name'  => 'required',
            'email'  => 'required',
            'description'  => 'required',
        ]);

        $SupportTicket  = new SupportTicket();
        $milliseconds = round(microtime(true) * 1000);
        $email = $request->input('email');
        $SupportTicket->ref_no = $milliseconds;
        $SupportTicket->customer_name = $request->input('name');
        $SupportTicket->problem_description = $request->input('description');
        $SupportTicket->email = $email;
        $SupportTicket->phone_number = $request->input('phone_number');
        $SupportTicket->status = "Pending";
        $SupportTicket->isView = false;
        $SupportTicket->created_at = Carbon::now()->toDateTimeString();

        $saved = $SupportTicket->save();
        if (!$saved) {
            App::abort(500, 'Error');
        }

        $details = [
            'title' => 'Your ticket has been created, Ref No:' . $milliseconds,
            'body' => 'You just created a ticket.',
            'status' => 'Pending'
        ];

        Mail::to($email)->send(new \App\Mail\ticketStatusMail($details));

        return Response()->json([
            "success" => true,
            "ref_no" => $milliseconds
        ]);
    }

    public function allTicketDetails(Request $request)
    {

        $allTicketDetails  = SupportTicket::orderBy('id', 'desc')->paginate(10);

        return response()->json([
            'status' => 200,
            'ticket_details' => $allTicketDetails,
        ]);
    }

    public function ticketlistCustomerWise(Request $request)
    {
        $txtCustomeName = $request->input('txtCustomeName');
        if ($txtCustomeName == null) {
            $allTicketDetails  = SupportTicket::orderBy('id', 'desc')->paginate(10);
        } else {
            $allTicketDetails  = SupportTicket::orderBy('id', 'desc')->where('customer_name','like', '%' . $txtCustomeName . '%' )->paginate(10);
        }
        return response()->json([
            'status' => 200,
            'ticket_details' => $allTicketDetails,
        ]);
    }

    public function search_ref(Request $request)
    {

        $ref_no = $request->input('ref_no');
        $details = SupportTicket::checkRef($ref_no);

        return $details;
    }
}
