<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Http\Request;

class MemberController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function customers() {
        $customers = Member::where( 'member_type', '1' )->orderBy( 'created_at', 'desc' )->get();
        return view( 'customer.index', compact( 'customers' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view( 'customer.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $validateData = $request->validate( [
            'name'        => 'required',
            'email'       => 'required',
            'phone'       => 'required|min:11',
            'address'     => 'required',
            'member_type' => 'required',
        ] );

        $member = new Member();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->member_type = $request->member_type;
        $member->save();

        toastr()->addSuccess( 'Customer has been stored' );
        return redirect()->route( 'customer.index' );
    }

    /**
     * Display the specified resource.
     */
    public function show( Member $member, $id ) {
        $customer = Member::findOrFail($id);
        $transactions = Transaction::where('member_id', $id)->get();
        return view('customer.show', compact('transactions', 'customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Member $member, $id ) {
        $customer = Member::findOrFail( $id );
        return view( 'customer.edit', compact( 'customer' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Member $member, $id ) {
        $validateData = $request->validate( [
            'name'        => 'required',
            'email'       => 'required',
            'phone'       => 'required|min:11',
            'address'     => 'required',
            'member_type' => 'required',
        ] );

        $customer = Member::findOrFail( $id );
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->member_type = $request->member_type;
        $customer->update();

        toastr()->addSuccess( 'Customer update successfully' );
        return redirect()->route( 'customer.index' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Member $member ) {
        //
    }
}
