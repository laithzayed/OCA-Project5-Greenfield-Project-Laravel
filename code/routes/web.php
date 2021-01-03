<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Recruiter;
use App\User;
use App\JobPost;
use App\Category;



// Route::get('/landingpage', function () {
//     return view('landingpage');
// });

Route::get('/home', 'JobPostController@indexhome');

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/edit_user_info', function () {
    return view('user.edit_user_info');
});
// Route::get('/categories', function () {
//     return view('categories');
// });
Route::get('/contactus', function () {
    return view('contactus');
});
Route::get('/about', function () {
    return view('about');
});

// ************************************************user

Route::get('/index', function () {
    return view('user.index');
});
Route::get('/user_profile', function () {
    return view('user.user_profile');
});
Route::get('/user_public', function () {
    return view('user.user_public');
});
Route::get('/edit', function () {
    return view('user.edit');
});
Route::get('/applied_job', function () {
    return view('user.applied_job');
});


// ************************************************ recruiter

Route::get('/editrecruiter', function () {
    return view('recruiter.editrecruiter');
});

Route::post('/job_post',function () {
    return view('recruiter.job_post'); 
});


Route::get('/job_post', function () {
    return view('recruiter.job_post');
});
Route::get('/view_post', function () {
    return view('recruiter.view_post');
});





// *************************** dashboard
Route::get('/Category', function () {
    return view('Category');
});
Route::get('/Jobs', 'RecruiterController@getJobsList');
Route::get('/Jobs/{id}/delete', 'RecruiterController@delete');

Route::get('/Users', function () {
    return view('Manage_Users');
});
Route::get('/recruiters', function () {
    return view('Mange_Recruiters');
});
Route::post('/Category/create', 'CategoryController@store');
Route::get('/Category/{category}/delete', 'CategoryController@delete');
Route::get('/Category', 'CategoryController@create')->name('Category');

Route::get('/Category/{category}/edit', 'CategoryController@edit');
Route::post('/category/{category}/update', 'CategoryController@update');


// *************************************posts
// Route::get('/single', function () {
//     return view('single');
// });

// Ahmeeeeeeeeeeeeeeeeed
Route::get('job_post', 'JobPostController@create11');
Route::post('search_post', 'JobPostController@search');


Route::post('view_post', 'JobPostController@create');

Route::get('view_post', 'JobPostController@index');

Route::get('edit_post/{id}', 'JobPostController@edit');

Route::post('edit_post/view_post/{id}', 'JobPostController@update');

Route::get('view_post/{id}', 'JobPostController@destroy');

Route::get('jobs/{id}/delete', 'JobPostController@destroy');

Route::get('single/{id}', 'JobPostController@show1');

Route::get('/PostsCategories/{id}', 'CategoryController@show1');

Route::get('recruiter_profile/{id}', 'JobPostController@show2');

// ***************************************************************************Home aseel

Route::get('/', 'JobPostController@indexhome');

// ************************************************************************* post single aseel

Route::get('/home','JobPostController@indexhome');
Route::get('/single/{$id}', 'JobPostController@indexsinglepage');


// *************************************************************************Aya 

Route::get('/Category', 'CategoryController@create')->name('Category');
Route::get('/categories', 'CategoryController@index')->name('Categories');



////////////////////////////////////////////////////////////////////////////////////////////////////
// TESTING RELATIONS START
///////////////////////////////////////////////////////////////////////////////////////////////////
//get all posts recuiter with specific id posted 
Route::get('/posts/{id}', function($id){
    $post = Recruiter::find($id);
    foreach($post->posts as $p){
        echo $p->job_title . "<br>"."<br>";
    }
    });
    //get all job posts  
    Route::get('posts', function(){
       $posts= JobPost::all();
       foreach($posts as $post){
           echo $post->job_title . "<br>";
       }
    });
    //get applied posts for certain seeker
    Route::get('seekpost/{id}', function($id){
    $seek = User::find($id);
    foreach($seek->jobpost as $s){
        echo $s->job_title . "<br>";
    }
    });
    //get seeker who applied for a certain post
    Route::get('seek/{id}', function($id){
        $seek = JobPost::find($id);
        foreach($seek->seeker as $sp){
            echo $sp->email . "<br>";
        }
        });
    //get the recruiter who posted the job which was applied to
    // Route::get('recruit/{id}', function($id){
    //     $recruit = JobPost::find($id);
    //     foreach($recruit->recruiterseeker as $rs){
    //         echo $rs;
    //     }
    // });
    // get the category of a certain jobpost  
    // get all job posts of a certain category  
    Route::get('/cat/{id}', function($id){
        $cat = Category::find($id);
        foreach($cat->catposts as $c){
            echo $c->job_title . "<br>"."<br>";
        }
        });
    // get recruiter data from profile table 
    Route::get('test3/{id}', function ($id){
        $values = Recruiter::find($id)->profile;
        return view('test3', compact('values'));
    });
    // get user data from profile table 
    Route::get('test2/{id}', function ($id){
        $values = User::find($id)->profile;
        return view('test2', compact('values'));
    });
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    // TESTING RELATIONS END
  
    ///////////////////////////////////////////////////////////////////////////////////

    Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
//*// Start -> Auth Routes ( Users + Admin + Recruiters ) => Register && Login
Route::get('/home', 'HomeController@index')->name('home');
    Route::prefix('admin')->group(function(){
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
    });
Route::prefix('recruiter')->group(function(){
    Route::get('/login', 'Auth\RecruiterLoginController@showLoginForm')->name('recruiter.login');
    Route::post('/login', 'Auth\RecruiterLoginController@login')->name('recruiter.login.submit');
    Route::get('/', 'RecruiterController@index')->name('recruiter.dashboard');
    Route::get('/register', 'Auth\RecruiterRegisterController@index')->name('recruiter.register');
    Route::post('/register', 'Auth\RecruiterRegisterController@store')->name('recruiter.register.submit');
});
// End -> Auth Routes ( Users + Admin + Recruiters ) => Register && Login

///     Mange Admin ////
Route::post('/Admin/create', 'AdminController@store')->name('admin.create');
Route::get('/Admin/{admin}/delete', 'AdminController@delete');
Route::get('/Admin', 'AdminController@create')->name('Manage_Admins');
Route::get('/Admin/{admin}/edit', 'AdminController@edit');
Route::post('/Admin/{admin}/update', 'AdminController@update');

// ****welcome admin*********************************************************
Route::get('/welcome_admin', function () {
    return view('welcome_admin');
});


// ****** Users show
Route::get('/Users', 'UserController@show');
Route::get('/Users/{id}/delete', 'UserController@delete');
// *** End users show
// ****** Recruiters show
Route::get('/recruiters', 'UserController@index');
Route::get('/recruiters/{id}/delete', 'UserController@delete');
// *** End Recruiters show


////start user profile
Route::get('/user_profile/{id}', 'ProfileController@show2');
Route::get('/edit/{id}', 'ProfileController@edit');
Route::post('/update/{id}', 'ProfileController@update');



// ****welcome users *********************************************************
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/welcome_register', function () {
    return view('welcome_register');
});

Route::get('/welcome_login', function () {
    return view('welcome_login');
});


////job application start
Route::get('/apply/{id}', 'ProfileController@apply');
Route::post('/jobuser/{id}', 'ProfileController@store');
Route::get('applied_job/{id}', 'ProfileController@show3');
////job application end





