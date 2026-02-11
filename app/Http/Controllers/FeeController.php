<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SemesterFee;

class FeeController extends Controller
{

// Show Form
public function addForm()
{
    return view('admin.add_fee');
}


// Save Data
public function saveFee(Request $req)
{
    $fee = new SemesterFee();

    $fee->department = $req->department;
    $fee->semester = $req->semester;
    $fee->fee_type = $req->fee_type;
    $fee->amount = $req->amount;

    $fee->save();

    return back();
}


// Show List
public function list()
{
    $data = SemesterFee::all();
    return view('admin.fee_list', compact('data'));
}


// Delete
public function delete($id)
{
    SemesterFee::find($id)->delete();
    return redirect('/list');
}


// Edit Form
public function edit($id)
{
    $data = SemesterFee::find($id);
    return view('admin.edit_fee', compact('data'));
}


// Update
public function update(Request $req, $id)
{
    $fee = SemesterFee::find($id);

    $fee->department = $req->department;
    $fee->semester = $req->semester;
    $fee->fee_type = $req->fee_type;
    $fee->amount = $req->amount;

    $fee->save();

    return redirect('/list');
}

}
