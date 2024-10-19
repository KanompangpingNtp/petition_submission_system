<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;

class IistcomplaintController extends Controller
{
    //
    public function Iistcomplaintindex()
    {
        // ดึงข้อมูลคำร้องทั้งหมด
        $complaints = Complaint::all(); // คุณอาจต้องปรับการดึงข้อมูลตามต้องการ เช่น paginate() เป็นต้น

        return view('admin.admin_Iist_complaint.admin_Iist_complaint', compact('complaints'));
    }

    public function complaintshow($id)
    {
        // ดึงข้อมูลคำร้องตาม ID
        $complaint = Complaint::findOrFail($id);

        return view('admin.admin_Iist_complaint.admin_Iist_complaint_resuit', compact('complaint'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|integer|in:1,2,3,4', // ตรวจสอบค่าที่รับเข้ามา
        ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->status = $request->status; // อัปเดตสถานะ
        $complaint->save();

        return redirect()->back()->with('success', 'สถานะของคำร้องได้รับการอัปเดตเรียบร้อยแล้ว');
    }

    public function Iistcomplaintaccount()
    {
        // ดึงข้อมูลคำร้องที่ส่งโดยผู้ใช้ที่ล็อกอิน
        $userId = Auth::id();
        $complaints = Complaint::where('user_id', $userId)->get(); // ดึงเฉพาะคำร้องของผู้ใช้คนนั้น

        return view('account_users.account_users_list_complaint', compact('complaints'));
    }

    public function Iistcomplaintaccountshow($id)
    {
        // ดึงข้อมูลคำร้องตาม ID
        $complaint = Complaint::findOrFail($id);

        return view('account_users.account_users_list_complain_result', compact('complaint'));
    }
}
