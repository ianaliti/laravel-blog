<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

//Get route example
Route::get("/", function () {
    $posts = Post::all();
    return view('home', ['posts' => $posts]);
})->name('home');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/userhome', function () {
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->posts()->latest()->get();
    }
    return view('/userhome', compact('posts'));
})->name('userhome');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/formsubmitted', [UserController::class, 'formsubmitted'])->name('formsubmitted');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/login', [UserController::class, 'login'])->name('login');


// Post 
Route::post('/create-post', [PostController::class, 'createPost'])->name('create-post')->middleware('auth');
Route::get('edit-post/{post}', [PostController::class, 'showEditPost'])->name('edit-post')->middleware('auth');
Route::put('/edit-post/{post}', [PostController::class, 'updatePost'])->name('update-post')->middleware('auth');
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost'])->name('delete-post')->middleware('auth');
Route::get('/user-post/{post}', [PostController::class, 'openPost'])->name('user-post');

// //Parameters using routes
// Route::get('/portfolio/{firstname}/{lastname}', function ($firstname, $lastname) {
//     // return $firstname . ' ' . $lastname;
//     return view('portfolio');
// });


//Named routes
// Route::get('/test', function () {
//     return 'This is a test';
// })-> name("testpage");

// //Grouped routes
// Route::get('/portfolio', function () {
//     return view('portfolio');
// });

// Route::prefix("portfolio")->group(function() {

//     Route::get('/contact', function () {
//         return view('contact');
//     });
    
//     Route::get('/organisation', function () {
//         return view('organisation');
//     });

// });


// Post route example
// Route::post("/formsubmitted", function (Request $request) {

//     $request->validate([
//         'name' => 'required|min:3|max:20',
//         'email' => 'required|min:5|max:20|email',
//     ]);

//     $name = $request->input('name');
//     $email = $request->input('email');
   
//     return "Your name is $name and your email is $email";

// })->name("formsubmit");


// Route::get('/contact', function () {
//     return view('contact');
// });




// Route::resource('posts', PostController::class);