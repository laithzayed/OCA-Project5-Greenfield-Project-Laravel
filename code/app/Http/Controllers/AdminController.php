<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('welcome_admin');
    }


    /**
     * new cooode
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        //   $admins = Admin::all();
        $admins = Admin::orderByDesc('id')->get();
        return view('Manage_Admins',[
            'admins' => $admins,
        ]);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new Admin();
        $admin->name       =$request->get('name');
        $admin->email      =$request->get('email');
        $admin->password   = Hash::make($request->get('password'));


        $admin->save();
        return redirect()->route('Manage_Admins');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::where('id','=',$id)->first();
        return view('edit_Admins',[
            'admin'=>$admin
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request,$admin)
    // {
    //     ////$categorie = Category::where('job_cat_id','=',$category)->first();
    //     Admin::where('id','=' ,$admin)
    //     ->update(['name' => $request->get('name')]);
    //     ->update(['email' => $request->get('email')]);
    //     ->update(['password' => $request->get('password')]);

    //    return redirect()->route('Mange_Admins');
    //    ///

    // }
    public function update(Request $request,$id)
    {
        $admin = Admin::findOrfail($id);
        $admin->name=$request->get('name');
        $admin->email=$request->get('email');
        $admin->password=$request->get('password');

        //    if($request->file('admin_image')){
        //     $file = $request->file('admin_image');// as $image){
        //         $image = $file->store(
        //             'admins/images',
        //             'public'
        //         );
        //         $admin->admin_image = $image;
        //     }
        $admin->save();
        return redirect()->route('Manage_Admins');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function delete($admin)   {
        //$categorie = Category::where('job_cat_id','=',$category)->first();
        Admin::where('id', $admin)->delete();
        // $categorie->delete();
        return redirect()->route('Manage_Admins');
    }



}
