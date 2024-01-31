<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Member;
use App\Models\Transaction;

class ReportController extends Controller {
    public function index() {
        $members = Member::where('member_type', 1)->get();
        $membersCredit = Member::where('member_type', 2)->get();
        $debitData = [];
        $creditData = [];

        foreach ($members as $member) {
            $debit = Transaction::where('member_id', $member->id)->sum('amount');
            $debitData[] = [
                'name' => $member->name,
                'id' => $member->id,
                'debit' => $debit,
            ];
        }

        foreach ($membersCredit as $memberCredit) {
            $credit = Transaction::where('member_id', $memberCredit->id)->sum('amount');
            $creditData[] = [
                'name' => $member->name,
                'id' => $member->id,
                'credit' => $credit,
            ];
        }

        return view('report.index', compact('debitData', 'debit', 'creditData'));
    }

    public function customers() {
        
    }

    public function friends() {
        $loans = Loan::all();
        return view('report.friends', compact('loans'));
    }
}
