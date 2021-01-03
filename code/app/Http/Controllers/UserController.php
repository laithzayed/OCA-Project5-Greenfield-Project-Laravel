<?php

namespace App\Http\Controllers;

use App\Recruiter;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Manage_Admins');
    }

    public function show(){

        $users = User::OrderBy('created_at', 'desc')->get();

        return view('Manage_Users', compact('users'));

    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect ('/Users');

    }
}
