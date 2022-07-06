<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Authz;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;


class Auth extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Login', ['title' => 'Authorization']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        if (Authz::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Authz::user();
            return Redirect::route('home')
                ->with('message', 'Hallo');
        } else {
            return Redirect::route('login')
                ->with('message', 'Your mail and password is not match!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return Inertia::render('Register', [
            'title' => 'Register'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'repassword' => 'required|same:password'
        ]);

        $post = User::create([
            'name'     => $request->name,
            'email'   => $request->email,
            'password'   => bcrypt($request->password)
        ]);

        if ($post) {
            Authz::login($post);
            return Redirect::route('home')
                ->with('message', 'Hallo');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Authz::logout();
        Session::flush();
        return redirect('/auth');
    }

    public function recovery()
    {
        return Inertia::render('Recovery', [
            'title' => 'Recovery'
        ]);
    }

    public function reset_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
    }
}
