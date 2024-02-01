<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class ReportController extends Controller {
    public function index() {
        $today = Carbon::today();
        //expense today
        $membersExpense = Member::where('member_type', 2)->get();
        $todayExpense = 0;
        foreach ($membersExpense as $member) {
            $todayExpense += Transaction::where('member_id', $member->id)->whereDate('created_at', $today)->sum('amount');
        }
        // income today
        $membersIncome = Member::where('member_type', 1)->get();
        $todayIncome = 0;
        foreach ($membersIncome as $member) {
            $todayIncome += Transaction::where('member_id', $member->id)->whereDate('created_at', $today)->sum('amount');
        }
        // all transactions
        $transactions = Transaction::orderBy('created_at', 'desc')->get();
        // all loans
        $todayLoan = Loan::whereDate('created_at', $today)->sum('amount');


        //monthly collection
        $currentMonth = Carbon::now()->startOfMonth();
        //expense month
        $membersExpense = Member::where('member_type', 2)->get();
        $monthExpense = 0;
        foreach ($membersExpense as $member) {
            $monthExpense += Transaction::where('member_id', $member->id)->whereDate('created_at', $currentMonth)->sum('amount');
        }
        // income month
        $membersIncome = Member::where('member_type', 1)->get();
        $monthIncome = 0;
        foreach ($membersIncome as $member) {
            $monthIncome += Transaction::where('member_id', $member->id)->whereDate('created_at', $currentMonth)->sum('amount');
        }
        // all loans
        $monthLoan = Loan::whereDate('created_at', $currentMonth)->sum('amount');
        return view('report.index', compact('todayIncome', 'todayExpense', 'todayLoan', 'monthIncome', 'monthExpense', 'monthLoan', 'transactions'));
    }

    public function customers() {
        
    }

    public function friends() {
        $loans = Loan::all();
        return view('report.friends', compact('loans'));
    }
}
