<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\MailHelper;
use App\Exports\DealDoneExport;
use Maatwebsite\Excel\Facades\Excel;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $Inquiries = Inquiry::orderBy('id', 'desc')->paginate(10);
        return view('admin.inquiries.index', compact('Inquiries'));
    }
    public function delete(Request $request)
    {
        DB::table('inquery')->where(['id' => $request->inquiryid])->delete();
        return back()->with('success', 'inquiry Deleted Successfully!.');
    }

    public function multiDelete(Request $request)
    {
        $request->validate([
            'inquiry_ids' => 'required|array',
            'inquiry_ids.*' => 'integer',
        ]);

        DB::table('inquery')
            ->whereIn('id', $request->inquiry_ids)
            ->delete();

        return back()->with('success', 'Selected Inquiries Deleted Successfully!');
    }
}
