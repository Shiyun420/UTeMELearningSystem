<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\Announcement;

class AnnouncementController extends Controller
{

    public function index(){

        $announcements = Announcement::where('CourseID', session('lecturerCourseID'))->get();
        return view('lecturer.announcement.index', compact('announcements'));
    }

    //when add announcement, use annoucement->courseID=session('lecturerCourseID');

    public function add_announcement(Request $request){
        $request->validate([
            'details' => 'required|string',
        ]);

        $announcement = new Announcement();
        $announcement->details = $request->input('details');
        $announcement->CourseID = session('lecturerCourseID');
        $announcement->save();

        return redirect()->route('lecturer.announcement_index')->with('success', 'Announcement added successfully!');
    }


    public function delete_announcement($id)
    {
        $announcement = Announcement::find($id);
        if ($announcement) {
            $announcement->delete();
            return redirect()->route('lecturer.announcement_index')->with('success', 'Announcement deleted successfully!');
        } else {
            return redirect()->route('lecturer.announcement_index')->with('error', 'Announcement not found!');
        }
    }
    public function edit_announcement(Request $request, $id)
    {
        $request->validate([
            'details' => 'required|string|max:255',
        ]);

        $announcement = Announcement::findOrFail($id);

        try {
            $announcement->details = $request->details;
            $announcement->save();

            return redirect()->back()->with('success', 'Announcement updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update announcement. Please try again.');
        }
    }


}
