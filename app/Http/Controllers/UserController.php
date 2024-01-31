<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $users = User::where('is_admin', '!=', '1')->orderBy( 'created_at', 'desc' )->get();
        return view( 'user.index', compact( 'users' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view( 'user.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $validateData = $request->validate( [
            'name'     => 'required',
            'email'    => 'required|email',
            'salary'   => 'required|integer',
            'address'  => 'required',
            'phone'    => 'required|numeric',
            'password' => 'required|min:6',
            'status'   => 'required',
            'is_admin' => 'required',
            'photo'    => 'required',
        ] );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->salary = $request->salary;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->password = bcrypt( $request->password );
        $user->status = $request->status;
        $user->is_admin = $request->is_admin;
        if ( $request->photo ) {
            $photo = $request->file( 'photo' );
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $path = public_path( '/uploads' );
            $photo->move( $path, $photoName );
            $user->photo = $photoName;
        }
        $user->save();
        toastr()->addSuccess( 'User has been stored' );
        return redirect()->route( 'user.index' );
    }

    /**
     * Display the specified resource.
     */
    public function show() {
        $user = User::findOrFail( Auth::user()->id );
        return view( 'profile.show', compact( 'user' ) );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id ) {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, string $id ) {
        $validateData = $request->validate( [
            'name'    => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'address' => 'required',
        ] );

        $user = User::findOrFail( $id );
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        //photo upload
        if ( $request->photo ) {
            $path = public_path( "/uploads/" ) . $user->photo;
            if ( File::exists( $path ) ) {
                File::delete( $path );
            }
            $photo = $request->file( 'photo' );
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $path = public_path( '/uploads' );
            $photo->move( $path, $photoName );
            $user->photo = $photoName;
        }
        $user->update();
        toastr()->addSuccess( 'Update Success' );
        return redirect()->route('user.index');
    }

    /**
     * Password Update
     */
    public function passwordUpdate( Request $request, $id ) {
        $user = User::findOrFail( $id );

        if ( Hash::check( $request->old_password, $user->password ) ) {
            if ( $request->new_password == $request->confirm_password ) {
                $user->password = bcrypt( $request->new_password );
                $user->save(); // Instead of update() method
                toastr()->addSuccess( 'Password Change Success' );
                return redirect()->route( 'dashboard' );
            } else {
                toastr()->addError( 'Your New password & Confirm Password Mismatch!!' );
                return redirect()->back();
            }
        } else {
            toastr()->addError( 'Your old password is wrong!!' );
            return redirect()->back();
        }
    }

    /**
     * change Password
     */
    public function changePassword() {
        $user = User::findOrFail( Auth::user()->id );
        return view( 'profile.password', compact( 'user' ) );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id ) {
        $user = User::findOrFail($id);
        $user->delete();

        toastr()->addSuccess('User Deleted');
        return redirect()->route('user.index');
    }
}
