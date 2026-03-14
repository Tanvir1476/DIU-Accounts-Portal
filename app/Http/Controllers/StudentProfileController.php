<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\Auth;

class StudentProfileController extends Controller
{

    public function index()
    {

        $profile = StudentProfile::where('user_id', Auth::id())->first();

        return view('student.profile', compact('profile'));
    }

    public function update(Request $request)
    {

        $profile = StudentProfile::where('user_id', Auth::id())->first();

        /* block edit if approved */

        if ($profile && $profile->approved) {

            return back()->with('error', 'Profile already approved');
        }


        /* create or update profile */

        $profile = StudentProfile::updateOrCreate(

            ['user_id' => Auth::id()],

            [
                'department' => $request->department,
                'semester' => $request->semester,
                'phone' => $request->phone,
                'address' => $request->address
            ]

        );


        /* photo upload */

        if ($request->hasFile('photo')) {

            $photo = $request->file('photo')->store('profiles', 'public');

            $profile->photo = $photo;
            $profile->save();
        }


        return back()->with('success', 'Profile Updated Successfully');
    }
}
