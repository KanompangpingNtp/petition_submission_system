<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class UsersformController extends Controller
{
    //
    public function index()
    {
        return view('users.users_form.users_form');
    }

    public function Formcreate(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'age' => 'required|integer',
            'occupation' => 'required|string|max:100',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'required|string',
            'subject' => 'required|string|max:255',
            'additional_details' => 'nullable|string',
            'image_path' => 'nullable|image',
        ]);

        $complaint = new Complaint();
        $complaint->user_id = auth()->check() ? auth()->id() : null; // กรณีผู้ใช้ล็อกอิน
        $complaint->full_name = $request->full_name;
        $complaint->gender = $request->gender;
        $complaint->age = $request->age;
        $complaint->occupation = $request->occupation;
        $complaint->phone_number = $request->phone_number;
        $complaint->email = $request->email;
        $complaint->address = $request->address;
        $complaint->subject = $request->subject;
        $complaint->additional_details = $request->additional_details;

        if ($request->hasFile('image_path')) {
            $complaint->image_path = $request->file('image_path')->store('complaints', 'public'); // ใช้โฟลเดอร์ complaints
        }

        $complaint->save();

        return redirect()->back()->with('success', 'คำร้องของคุณถูกส่งเรียบร้อยแล้ว');
    }

    public function dashboardUser()
    {
        return view('account_users.account_users_form');
    }
}
