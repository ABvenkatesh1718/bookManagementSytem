<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    final public function userRegistration(Request $request):void
    {
        $values=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        $user = new User();
        $user->fill($values);
        $user->save();
        echo "registration is done bro";
        return ;
    }
    final public function getData():void
    {
        $user = User::find(1);

        echo $user;

    }

    final public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $books=Book::where('user_id',Auth::id())->get();

          //  return view('BookManagement',['books'=>$books]);

          return redirect()->intended(route('/bookManagementHome'));

        }
        // Add an error message to the session and redirect back to login
        return redirect()->route('login')->with('error', 'Invalid email or password. Please try again.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have successfully logged out.');
    }






}
