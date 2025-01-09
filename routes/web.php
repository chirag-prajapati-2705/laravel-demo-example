<?php

use App\Events\PostNotification;
use App\GoogleTag;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThumbnailController;
use App\Models\Post;
use App\Models\User;
use App\Test\Test;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// echo data();die;
// $obj = new GoogleTag();

// $obj1 = app()->make(GoogleTag::class);
// $obj->getData();die;
// dd($obj,$obj1);

// echo __('auth.failed',['NAME'=>'chirag']);
// //echo trans_choice('auth.apples', 10);
// echo trans_choice('auth.minutes_ago', 3, ['value' => 20]);

// echo trans_choice('auth.apples', 0); // Output: No apples
// echo trans_choice('auth.apples', 31, ['count' => 1]); // Output: 1 apple
// echo trans_choice('auth.apples', 5, ['count' => 5]); // Output: 5 apples




//die;

Route::get('/custom-facade', function () {
    
//    Greeting::greet();

//   Custom::data();

// $data  =   CustomLogger::greet();
// dd($data);
   
    //return response(Greeting::greet(), 200);
 })->name('custom-facade');

Route::get('relationship',function(){

    $post = Post::find(1);
    dd($post->comments);

});


Route::get('/email', function () {
    
       //dd(auth()->user());
       event(new Registered(auth()->user()));

     });
    



Route::get('logger', function () {
   
    $message = "this is test ";
    Log::emergency($message);
    Log::alert($message);
    Log::critical($message);
    Log::error($message);
    Log::warning($message);
    Log::notice($message);
    Log::info($message);
    Log::debug($message);
    
    });




    $a=10;

    function test(){

        

    }





Route::view('file','upload');
Route::post('upload-data',function(){
    $file = request()->file('file');

    $fileName = $file->getClientOriginalName();
    $filePath = $file->store('uploads', 'public');

    dd(request()->all());
})->name('upload');


Route::get('event', function () {
    $data =['hello'];
    event(New PostNotification($data));
});


Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('post', PostController::class);
    Route::resource('category', CategoryController::class);
        
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/users/{user}', function (User $user) {
dd($user); 
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/custom', function () {
//     return view('dashboard');
// })->middleware(['auth', 'role:admin'])->name('dashboard');

// Route::resource('publicacion', PhotoController::class);
// Route::get('/create', function () {
//     return view('welcome');
// });
// Route::singleton('photos.thumbnail', ThumbnailController::class);


// // Route::resource('photos', PhotoController::class)->names([
// //     'create' => 'photos.build'
// // ]);





//get retrive from view 
Route::get('check-view',function(){
    $dog = DB::table('get_user')->get();
});