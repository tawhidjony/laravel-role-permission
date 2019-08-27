<?php

namespace App\Http\Controllers;

use App\Http\Traits\ResponseMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    use ResponseMessage;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
    public function changePasswordForm()
    {
        $user = Auth::user();
        return view('edit-user', compact('user'));
    }
    public function updatePassword(Request $request)
    {
        try {
            try {
                $request->validate([
                    /* 'name' => ['required', 'string', 'max:255'],
                     'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth()->user()->id],*/
                    'password' => ['required', 'string', 'min:6', 'confirmed'],
                    'old_password' => ['required'],
                ]);

            } catch (\Illuminate\Validation\ValidationException $e) {
                return redirect()->back()->withErrors($e->errors());
            }
            if (Hash::check($request->old_password, Auth::user()->password)) {
                $user = Auth::user();
                if ($user) {
                    if ($request->password)
                        $user->password = Hash::make($request->input('password'));
                    $user->save();

                    return redirect('update-password')->with($this->create_success_message);
                } else {
                    return back()->withErrors('Unauthenticated');
                }
            } else {

                return redirect()->back()->withErrors('Password does not match');
            }

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return back();
        }
    }
}
