<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;


class AnnouncementController extends Controller
{

    public function index()
    {
        $announcements = Announcement::latest()->get();
        return view('admin.announcements', compact('announcements'));
    }

    public function store(Request $request)
    {

        Announcement::create([
            'title' => $request->title,
            'message' => $request->message,
            'type' => $request->type
        ]);

        return back()->with('success', 'Announcement Added');
    }

    public function destroy($id)
    {
        Announcement::findOrFail($id)->delete();
        return back()->with('success', 'Announcement Deleted');
    }
}
