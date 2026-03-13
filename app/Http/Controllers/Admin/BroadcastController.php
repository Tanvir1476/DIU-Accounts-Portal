<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BroadcastController extends Controller
{

    public function index()
    {
        $students = User::where('role', 'student')->get();

        return view('admin.broadcast', compact('students'));
    }

    public function send(Request $request)
    {

        $subject = $request->subject;
        $message = $request->message;

        if ($request->type == "all") {

            $students = User::where('role', 'student')->get();

            foreach ($students as $s) {

                Mail::raw($message, function ($mail) use ($s, $subject) {

                    $mail->to($s->email)
                        ->subject($subject);
                });
            }
        } else {

            $student = User::find($request->student_id);

            Mail::raw($message, function ($mail) use ($student, $subject) {

                $mail->to($student->email)
                    ->subject($subject);
            });
        }

        return back()->with('success', 'Message Sent');
    }
}
