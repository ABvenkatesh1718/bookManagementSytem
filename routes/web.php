<?php
    use App\Http\Controllers\bookController;
    use App\Http\Controllers\userController;
    use App\Http\Middleware\checkAuth;
    use Illuminate\Support\Facades\Route;
    use App\Models\Book;
    use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

Route::post('/user/register',[userController::class,'userRegistration'])->name('userRegistration');
Route::get('/user/getData',[userController::class,'getData'])->name('getData');
Route::post('/user/login', [userController::class, 'login'])->name('login');
Route::post('/user/logout',[userController::class,'logout'])->name('logout')
->middleware(checkAuth::class);


Route::get('/books/home/page',function()
{

    $user = Auth::user();
    $books=Book::where('user_id',Auth::id())->get();

    return view('BookManagement',['books'=>$books]);


})->name('/bookManagementHome')->middleware(checkAuth::class);


Route::get('/login', function () {
        return view('home');
})->name('login');


Route::post('/book/createBook',[bookController::class,'createBook'])->name('createBook')->middleware(checkAuth::class);


Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name('editBook')->middleware(checkAuth::class);


Route::put('/book/update/{id}', [BookController::class, 'update'])->name('updateBook')->middleware(checkAuth::class);


Route::delete('/book/delete/{id}',[bookController::class,'delete_book'])->name('delete')->middleware(checkAuth::class);






