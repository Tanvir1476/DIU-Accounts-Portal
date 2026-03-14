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

        if (!$profile || $profile->approved == 0) {

            $totalPayable = 0;
        } else {

            switch ($profile->department) {

                case 'SWE':
                    $totalPayable = 800000;
                    break;

                case 'CSE':
                    $totalPayable = 1000000;
                    break;

                case 'EEE':
                    $totalPayable = 600000;
                    break;

                case 'NFE':
                    $totalPayable = 500000;
                    break;

                default:
                    $totalPayable = 0;
            }
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
