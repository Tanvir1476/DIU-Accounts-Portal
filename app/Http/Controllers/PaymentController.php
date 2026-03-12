<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function pay(Request $request)
    {

        $post_data = [];

        $post_data['store_id'] = "farha69aa44f8ccd59";
        $post_data['store_passwd'] = "farha69aa44f8ccd59@ssl";

        $post_data['total_amount'] = $request->amount;
        $post_data['currency'] = "BDT";

        $post_data['tran_id'] = Auth::id() . '_' . uniqid();

        $post_data['success_url'] = url('/success');
        $post_data['fail_url'] = url('/fail');
        $post_data['cancel_url'] = url('/cancel');

        $post_data['cus_name'] = Auth::user()->name;
        $post_data['cus_email'] = Auth::user()->email;
        $post_data['cus_phone'] = $request->phone;


        $handle = curl_init();

        curl_setopt($handle, CURLOPT_URL, "https://sandbox.sslcommerz.com/gwprocess/v4/api.php");
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

        $content = curl_exec($handle);
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        curl_close($handle);

        if ($code == 200 && !empty($content)) {
            $link = json_decode($content, true);

            return redirect($link['GatewayPageURL']);
        }
    }

    public function success(Request $request)
    {

        $tran = $request->tran_id;

        $user_id = explode('_', $tran)[0];
        Auth::loginUsingId($user_id);
        
        Payment::create([
            'user_id' => $user_id,
            'amount' => $request->amount,
            'trx_id' => $tran,
            'status' => 'paid'
        ]);

        return view('student/success');
    }

    public function history()
    {

        $payments = Payment::where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get();

        return view('student.online_payment_history', compact('payments'));
    }

    public function fail()
    {
        return "Payment Failed";
    }

    public function cancel()
    {
        return "Payment Cancelled";
    }
}
