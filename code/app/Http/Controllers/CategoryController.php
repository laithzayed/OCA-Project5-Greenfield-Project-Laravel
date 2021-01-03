<?php

namespace App\Http\Controllers;
use App\Category;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('Category');
        
      $categories = Category::all();
      return view('categories',[
          'categories' => $categories,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $categories = Category::all();
      return view('Category',[
          'categories' => $categories,
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
         $category            = new Category();
         $category->job_cat   =$request->get('job_cat');
         $category->image     =$request->get('image');

        if ($request->hasfile('image')){
            $file=$request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename= time(). '.'. $extension;
            $file->move('uploads/photo/',$filename);
            $category->image =$filename;   
           }else{
            // return $request;
            $category->image='';
           }  
           $category->save();
         return redirect()->route('Category');
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

    public function show1($id)
    {
        $post=Category::find($id)->catposts;
        return view('PostsCategories',compact('post'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Category::where('id','=',$id)->first();
           return view('edit_category',[
            'categorie'=>$categorie
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$category)
    {
        ////$categorie = Category::where('job_cat_id','=',$category)->first();
        Category::where('id','=' ,$category)
        ->update(['job_cat' => $request->get('job_cat')]);
       return redirect()->route('Category');
       ///

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function delete($category)   {
       //$categorie = Category::where('job_cat_id','=',$category)->first();
        Category::where('id', $category)->delete();
       // $categorie->delete();
        return redirect()->route('Category');
    }

}

