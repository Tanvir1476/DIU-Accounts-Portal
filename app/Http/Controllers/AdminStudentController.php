<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\StudentProfile;

class AdminStudentController extends Controller
{

    public function index()
    {

        $students = User::where('role', 'student')->get();

        return view('admin.students', compact('students'));
    }


    public function view($id)
    {

        $profile = StudentProfile::where('user_id', $id)->first();

        return view('admin.student_details', compact('profile'));
    }


    public function approve($id)
    {

        $profile = StudentProfile::where('user_id', $id)->first();

        if (!$profile) {
            return back()->with('error', 'Profile not found');
        }

        $profile->approved = 1;
        $profile->save();

        return back();
    }
}
