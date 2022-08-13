<?php

namespace App\Http\Controllers\backend;

use App\Models\Appointment;
use App\Models\ContactMail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin',]);
    }

    public function dashboard() {
        $unreadMails = ContactMail::Where('status', 'un-read')->get();
        $appoints = Appointment::Where('status','not-visited')->get();
        return view('backend.dashboard', [
            'AppointsData' => $appoints,
            'CusMails' => $unreadMails,
        ]);
    }

    public function appointments() {
        $appoints = Appointment::all();
        return view('backend.appointment', [
            'AppointsData' => $appoints,
        ]);
    }

    public function appointmentDelete($id) {
        $res = Appointment::destroy($id);
        if ($res) {
            return redirect()->route('appointments')->with('success', 'Appointment Deleted Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function MarkAppointAsVisited($id) {
        $appoint = Appointment::find($id);
        if ($appoint->status == "not-visited") {
            $appoint->status = "visited";
            $res = $appoint->save();
        }

        if ($res) {
            return redirect()->route('appointments')->with('success', 'Customer Visited');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function showCusMails() {
        $mails = ContactMail::all();
        return view('backend.contact_mails', [
            'CusMails' => $mails,
        ]);
    }

    public function ContactMailDelete($id) {
        $res = ContactMail::destroy($id);
        if ($res) {
            return redirect()->route('showCusMails')->with('success', 'Contact Message Deleted Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function markMailAsRead($id) {
        $mail = ContactMail::find($id);

        if ($mail->status == "un-read") {
            $mail->status = "read";
            $res = $mail->save();
        }

        if ($res) {
            return redirect()->route('showCusMails')->with('success', 'Message Marked as Read');
        } else {
            return back()->with('error', 'Something went wrong!');
        }

    }
}
