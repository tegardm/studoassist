<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use App\Models\Matakuliah;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


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


    Route::get('/', function () {
        return view('client.index');
    });

    Route::get('/login', function () {
        return view('client.login.index');
    })->name('login')->middleware('guest');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', function(){
    return view('client.register.index');
})->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);


Route::get('/author',function () {
    return view('client.authors');
});

Route::get('/profile',function () {
    if (Auth::user()->is_admin) {
        return redirect('/dashboard');
    };
    return view('client.profile');
})->middleware('auth');

Route::post('/profile',[AuthController::class, 'changePassword'])->name('change-password');

Route::get('/tasks',function () {
    $data = Task::where('user_id', auth()->user()->id)->get();
    return view('client.tasks.index',["data" => $data]);
})->middleware('auth');

Route::get('/tasks/data/{id}',function ($id) {
    $data = Task::where('id', $id)->first();
    return view('client.tasks.task',["task"=>$data]);
});
Route::get('/tasks/modify/{id}',function ($id) {
    $data = Task::where('id', $id)->first();
    $matakuliah = Matakuliah::where("user_id",auth()->user()->id)->get();
    return view('client.tasks.taskModify',["data"=>$data,"matakuliah"=>$matakuliah]);
});

Route::get('/tasks/delete/{id}', [TaskController::class, 'deleteTask'])->name('delete-task');

Route::get('/tasks/delete/mk/{id}', [TaskController::class, 'deleteMk'])->name('delete-mk');


Route::get('/tasks/create',function () {
 $data = Matakuliah::where('user_id', auth()->user()->id)->get();
    return view('client.tasks.tasks',['data'=>$data]);
})->middleware('auth');

Route::post('/submit-form', [TaskController::class, 'submitForm']);
Route::put('/tasks/modify/{id}', [TaskController::class, 'updateTask'])->name('update-task');


Route::get('/tasks/mk',function () {
$data = Matakuliah::where('user_id', auth()->user()->id)->get();
return view('client.tasks.mk',['data' => $data]);
})->middleware('auth');

Route::get('/tasks/mk/{course_code}',function ($course_code) {
    $data = Matakuliah::where('course_code', $course_code)->first();
    return view('client.tasks.mkmodify',['data' => $data]);
    })->middleware('auth');

Route::post('/tasks/mk', [TaskController::class, 'submitMk']);

Route::put('/tasks/mk/{course_code}', [TaskController::class, 'updateMk'])->name('update-mk');

Route::get('/priority',function () {

    $data = Task::where('deadline', '<', Carbon::now())
            ->where('user_id', auth()->user()->id)
            ->where('status','!=','done')
            ->get();

    return view('client.prioritas',compact('data'));
})->middleware('auth');


Route::get('/forget',function () {
    return view('client.forget.forget');
})->middleware('guest');

Route::post('/tasks/mk', [TaskController::class, 'submitMk']);

Route::post('/forget', [AuthController::class, 'recoveryPassword'])->name('recovery-password');
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::prefix('/dashboard')->group(function () {

        Route::get('/matakuliah', [DashboardController::class, 'matakuliah']);
        Route::get('/tasks', [DashboardController::class, 'allTasks']);
        Route::get('/users', [DashboardController::class, 'users']);
        Route::get('/history', [DashboardController::class, 'history']);

        Route::group(['prefix' => '/users'], function () {

            Route::get('/{id}', [DashboardController::class, 'userShow']);
            Route::name('delete-user')->get('/delete/{id}', [DashboardController::class, 'deleteUser']);

            Route::group(['prefix' => '/{id}'], function () {

                Route::get('/tasks', [DashboardController::class, 'userTasks'])->name('userTasks');
                Route::get('/mk', [DashboardController::class, 'userMk'])->name('userMk');
                Route::name('delete-mk2')->get('/delete/mk', [DashboardController::class, 'deleteMk']);

                Route::group(['prefix' => '/tasks/{title}'], function () {
                    Route::get('', [DashboardController::class, 'userTask'])->name('userTask');
                    Route::get('/delete/{title}', [DashboardController::class, 'deleteTask']);
                });

            });

        });

    });

});


