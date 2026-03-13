<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\FeeRequest;
use App\Models\Payment;
use App\Models\StudentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $onlinePaid = Payment::where('user_id', $user->id)->sum('amount');

        $tokenPaid = FeeRequest::where('user_id', $user->id)
            ->where('status', 'Approved')
            ->sum('amount');

        $totalPaid = $onlinePaid + $tokenPaid;

        $profile = StudentProfile::where('user_id', $user->id)->first();

        $department = $profile->department ?? null;


        if ($department == "SWE") {

            $totalPayable = 800000;
        } elseif ($department == "CSE") {

            $totalPayable = 1000000;
        } elseif ($department == "NFE") {

            $totalPayable = 500000;
        } elseif ($department == "EEE") {

            $totalPayable = 600000;
        } else {

            $totalPayable = 0;
        }

        $totalDue = $totalPayable - $totalPaid;

        $recentPayments = Payment::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        $tokenRequests = FeeRequest::where('user_id', $user->id)
            ->where('status', 'Approved')
            ->selectRaw('fee_for, SUM(amount) as total_amount')
            ->groupBy('fee_for')
            ->get();

        $tokenLabels = $tokenRequests->pluck('fee_for');
        $tokenAmounts = $tokenRequests->pluck('amount');

        $announcements = Announcement::latest()
            ->take(5)
            ->get();

        return view('student.dashboard', compact(
            'totalPaid',
            'totalPayable',
            'totalDue',
            'onlinePaid',
            'recentPayments',
            'tokenRequests',
            'announcements'
        ));
    }
}
