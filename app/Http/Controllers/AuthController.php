<?php

namespace App\Http\Controllers;

// use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;
use Auth;
use Mail;
use App\Mail\ForgotPasswordMail;
use App\Http\Requests\ResetPassword;

class AuthController extends Controller
{
    public function registration()
    {
        return view('auth.registration');
    }

    public function registration_post(Request $request)
    {
        // dd($request->all());
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6',
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(20);
        $user->save();

        return redirect('login')->with('success', 'Register Successfully Done.');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        // dd($request->all());
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::user()->is_role == 2) {
                // echo "Super Admin";
                // die();
                return redirect()->intended('superadmin/dashboard');
            }
            if (Auth::user()->is_role == 1) {
                // echo "Admin";
                // die();
                return redirect()->intended('admin/dashboard');
            }
            if (Auth::user()->is_role == 0) {
                // echo "User";
                // die();
                return redirect()->intended('user/dashboard');
            } else {
                return redirect('login')->with('error', 'No Availables Email');
            }
        } else {
            return redirect('login')->with('error', 'Please enter the correct credentials');
        }
    }

    public function forgot()
    {
        return view('auth.forgot');
    }
    public function forgot_post(Request $request)
    {
        // dd($request->all());
        $count = User::where('email', '=', $request->email)->count();
        if ($count) {
            $user = User::where('email', '=', $request->email)->first();
            // $user->remember_token = Str::random(20);
            $user->save();
            // Mail
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', 'Password has been reset');
        } else {
            return redirect()->back()->with('error', 'Email not Found in the System');
        }
    }

    // reset
    public function getReset(Request $request, $token)
    {
        // dd($token);
        $user = User::where('remember_token', '=', $token);
        if ($user->count() == 0) {
            abort(403);
        }
        $user = $user->first();
        $data['token'] = $token;

        return view('auth.reset', $data);
    }

    public function postReset($token, ResetPassword $request)
    {
        $user = User::where('remember_token', '=', $token);
        if ($user->count() == 0) {
            abort(403);
        }
        $user = $user->first();
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(20);
        $user->save();

        return redirect('login')->with('sussess', 'Reset Password');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }
}
