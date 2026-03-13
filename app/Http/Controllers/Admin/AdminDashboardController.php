<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\FeeRequest;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{

    public function index()
    {

        $totalStudents = User::where('role', 'student')->count();

        $activeStudents = User::where('role', 'student')
            ->where('status', 'active')
            ->count();

        $inactiveStudents = User::where('role', 'student')
            ->where('status', 'inactive')
            ->count();

        $totalTokens = FeeRequest::count();


        /* payments */

        $onlinePayment = Payment::sum('amount');

        $offlinePayment = FeeRequest::where('status', 'Approved')->sum('amount');


        /* token requests peak time */

        $tokenTimes = FeeRequest::select(
            DB::raw("strftime('%H', created_at) as hour"),
            DB::raw("count(*) as total")
        )
            ->whereBetween(DB::raw("strftime('%H', created_at)"), ['09', '16'])
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();

        $timeLabels = [];
        $timeTotals = [];

        foreach ($tokenTimes as $t) {

            $hour = intval($t->hour);

            if ($hour > 12) {
                $label = ($hour - 12) . " PM";
            } elseif ($hour == 12) {
                $label = "12 PM";
            } else {
                $label = $hour . " AM";
            }

            $timeLabels[] = $label;
            $timeTotals[] = (int)$t->total;
        }

        return view('admin.dashboard', compact(

            'totalStudents',
            'activeStudents',
            'inactiveStudents',
            'totalTokens',

            'onlinePayment',
            'offlinePayment',

            'timeLabels',
            'timeTotals'

        ));
    }
}
