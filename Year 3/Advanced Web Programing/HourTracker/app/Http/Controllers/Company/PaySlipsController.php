<?php

namespace App\Http\Controllers\Company;

use App\Company;
use App\Http\Controllers\Controller;
use App\paySlip;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PaySlipsController extends Controller
{
    public function index(){
        $paySlips = paySlip::where('userID', Auth::id())->get();
        return view('company.dashboard.payslips.index')->with('paySlips', $paySlips);
    }

    public function downloadPDF($id){
        $paySlip = paySlip::with('staff.contactDetails', 'staff.companyInfo.contactDetails')->find($id);
        $pdf = PDF::loadView('export.payslip', compact('paySlip'));
        return $pdf->stream();
    }
}
