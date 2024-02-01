<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Member;
use App\Models\Transaction;

class ReportController extends Controller {
    public function index() {
        $totalLoan = Loan::where('status', 0)->sum('amount');
        //expense total
        $membersExpense = Member::where('member_type', 2)->get();
        $totalExpense = 0;
        foreach ($membersExpense as $member) {
            $totalExpense += Transaction::where('member_id', $member->id)->sum('amount');
        }
        // income total
        $membersIncome = Member::where('member_type', 1)->get();
        $totalIncome = 0;
        foreach ($membersIncome as $member) {
            $totalIncome += Transaction::where('member_id', $member->id)->sum('amount');
        }
        // all transactions
        $transactions = Transaction::orderBy('created_at', 'desc')->get();
        // all loans
        $loans = Loan::orderBy('created_at', 'desc')->get();
        return view('report.index', compact('totalIncome', 'totalExpense', 'totalLoan', 'transactions', 'loans'));
    }

    public function customers() {
        
    }

    public function friends() {
        $loans = Loan::all();
        return view('report.friends', compact('loans'));
    }
}
