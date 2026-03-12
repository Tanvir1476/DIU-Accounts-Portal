<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\FeeRequest;
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

        $totalPayable = 685000;

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

        return view('student.dashboard', compact(
            'totalPaid',
            'totalPayable',
            'totalDue',
            'onlinePaid',
            'recentPayments',
            'tokenRequests'
        ));
    }
}
