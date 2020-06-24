<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $login_status = FALSE;
        if (Auth::attempt(['username' => $request->email, 'password' => $request->password])) {
//             return redirect(PREFIX);
            $login_status = TRUE;
        } elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $login_status = TRUE;
        }
        //dd('asd');

        if (!$login_status) {
            $message = getPhrase("Please Check Your Details");
            flash('Ooops...!', $message, 'error');
            return redirect()->back();

            //    return redirect()->back()
            // ->withInput($request->only($this->loginUsername(), 'remember'))
            // ->withErrors([
            //     $this->loginUsername() => $this->getFailedLoginMessage(),
            // ]);
        }
    }
}
