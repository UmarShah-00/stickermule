<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

use Exception;

class SettingController extends Controller
{
    public function index(){
        return view('pages.setting.adminsetting');
    }

 

    public function updatesetting(Request $request)
    {
        try {
            $request->validate([
                'password' => ['required', 'confirmed', Password::min(8)],
            ]);
            
            $user = Auth::user();
            
            if (Hash::check($request->password, $user->password)) {
                return redirect()->back()->with('error', 'New password must be different from the current password.');
            }

            $user->password = Hash::make($request->password);
            $user->save();

            

            return redirect()->back()->with('success', 'Password updated successfully.');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the password. Please try again.');
        }
    }

}
