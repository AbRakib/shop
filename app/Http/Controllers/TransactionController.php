<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller {
    /**
     * loan transaction
     */
    public function loan() {
        $users = User::where('is_admin', '0')->get();
        $loans = Loan::orderBy('created_at', 'desc')->get();
        return view('transaction.loan', compact('loans', 'users'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();
        return view('transaction.index', compact('transactions'));
    }

    /**
     * income all list
     */
    public function income() {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();
        return view('transaction.income', compact('transactions'));
    }

    /**
     * income all list
     */
    public function expense() {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();
        return view('transaction.expense', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $members = Member::all();
        return view( 'transaction.create', compact( 'members' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $validateData = $request->validate( [
            'member_id'    => 'required',
            'amount'       => 'required',
            'payment_type' => 'required',
            'notes'        => 'required',
        ] );

        $transaction = new Transaction();
        $transaction->member_id = $request->member_id;
        $transaction->amount = $request->amount;
        $transaction->payment_type = $request->payment_type;
        $transaction->notes = $request->notes;
        $transaction->save();

        toastr()->addSuccess('Transaction Store Successfully');
        return redirect()->route('transaction.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function loanStore( Request $request ) {
        $validateData = $request->validate( [
            'user_id'    => 'required',
            'amount'       => 'required',
            'payment_type' => 'required',
            'notes'        => 'required',
        ] );

        $loan = new Loan();
        $loan->user_id = $request->user_id;
        $loan->amount = $request->amount;
        $loan->payment_type = $request->payment_type;
        $loan->notes = $request->notes;
        $loan->save();

        toastr()->addSuccess('Loan Store Successfully');
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show( Transaction $transaction ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function loanEdit( Request $request, $id ) {
        $loan = Loan::findOrFail($id);
        $users = User::all();
        return view('transaction.loanEdit', compact('loan', 'users'));
    }

    public function loanUpdate(Request $request, $id) {
        $validateData = $request->validate( [
            'user_id'    => 'required',
            'amount'       => 'required',
            'payment_type' => 'required',
            'notes'        => 'required',
            'status'        => 'required',
        ] );

        $loan = Loan::findOrFail($id);
        $loan->user_id = $request->user_id;
        $loan->amount = $request->amount;
        $loan->payment_type = $request->payment_type;
        $loan->notes = $request->notes;
        $loan->status = $request->status;
        $loan->update();

        toastr()->addSuccess('Loan update Successfully');
        return redirect()->route('transaction.loan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Transaction $transaction ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Transaction $transaction ) {
        //
    }
}
