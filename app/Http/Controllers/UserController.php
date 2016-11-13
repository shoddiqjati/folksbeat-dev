<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function postSignUp(Request $request) {
        $username = $request['username'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->username = $username;
        $user->password = $password;

        $user->save();

        return redirect()->back();
    }
    public function postSignIn(Request $request) {
        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
            return redirect()->route('books.index');
        }
        return redirect()->back();
    }
}