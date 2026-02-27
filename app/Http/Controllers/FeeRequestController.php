<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeeRequestController extends Controller
{

    public function store(Request $request)
    {
        $user = Auth::user();

        $lastToken = FeeRequest::max('token_number');
        $newToken = $lastToken ? $lastToken + 1 : 1;

        FeeRequest::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'fee_for' => $request->fee_for,
            'amount' => $request->amount,
            'token_number' => $newToken,
        ]);

        return back()->with('token', $newToken);
    }

    public function adminIndex()
    {
        $requests = FeeRequest::orderBy('token_number')->get();
        return view('admin.tokens', compact('requests'));
    }

    public function updateStatus($id, $status)
    {
        $req = FeeRequest::findOrFail($id);
        $req->status = $status;
        $req->save();

        return back();
    }
}
