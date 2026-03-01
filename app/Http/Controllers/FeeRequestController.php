<?php

namespace App\Http\Controllers;

use App\Models\FeeRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class FeeRequestController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->status == 'inactive') {
            return back()->with('error', 'Account is inactive');
        }

        $last = FeeRequest::max('token_number');
        $token = $last ? $last + 1 : 1;
        $hasCurrent = FeeRequest::where('is_current', true)->exists();

        FeeRequest::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'fee_for' => $request->fee_for,
            'amount' => $request->amount,
            'token_number' => $token,
            'is_current' => $hasCurrent ? false : true,
        ]);

        $this->sendMail();

        return back()->with('token', $token);
    }

    public function updateStatus($id, $status)
    {
        $req = FeeRequest::findOrFail($id);

        $req->status = $status;

        // সব current off 
        FeeRequest::where('is_current', true)->update(['is_current' => false]);

        // যেটাতে click করা হয়েছে → সেটাই current
        $req->is_current = true;
        $req->save();
        $this->sendMail();

        // reject count logic
        if ($status == 'Rejected') {
            $count = FeeRequest::where('user_id', $req->user_id)
                ->where('status', 'Rejected')
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();

            if ($count >= 3) {
                $user = User::find($req->user_id);
                $user->status = 'inactive';
                $user->save();
            }
        }

        return back();
    }

    private function sendMail()
    {
        $current = FeeRequest::where('is_current', true)->first();
        if (!$current) return;

        $targetToken = $current->token_number + 2;

        $student = FeeRequest::where('token_number', $targetToken)->first();

        if ($student) {
            Mail::raw(
                "Your serial {$student->token_number}, current is {$current->token_number}",
                function ($m) use ($student) {
                    $m->to($student->email)->subject('Token Update');
                }
            );
        }
    }

    public function adminIndex()
    {
        $requests = FeeRequest::orderBy('token_number')->get();
        return view('admin.tokens', compact('requests'));
    }

    public function paymentHistory(Request $request)
    {
        $query = FeeRequest::where('user_id', Auth::id());

        if ($request->search) {
            $query->where('fee_for', 'like', '%' . $request->search . '%');
        }

        if ($request->filter == 'month') {
            $query->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year);
        }

        if ($request->filter == 'year') {
            $query->whereYear('created_at', now()->year);
        }

        $requests = $query->orderBy('id', 'desc')->get();

        return view('student.payment_history', compact('requests'));
    }

    public function downloadInvoice($id)
    {
        $data = FeeRequest::findOrFail($id);

        if ($data->status != 'Approved') {
            return back()->with('error', 'Invoice not available');
        }

        $pdf = Pdf::loadView('student.invoice_pdf', compact('data'));

        return $pdf->download('DIU Payment Receipt.pdf');
    }


    public function pushPage()
    {
        $requests = FeeRequest::where('status', 'Pending')
            ->orderBy('token_number')
            ->get();

        return view('admin.push_notification', compact('requests'));
    }


    public function sendSingleNotification($id)
    {
        $student = FeeRequest::findOrFail($id);

        if ($student->status != 'Pending') {
            return back()->with('error', 'Cannot send notification');
        }

        Mail::raw(
            "Please Complete your payment within 30 seconds",
            function ($m) use ($student) {
                $m->to($student->email)
                    ->subject('Payment Reminder');
            }
        );

        $student->notified = true;
        $student->save();

        return back()->with('success', 'Notification Sent!');
    }
}
