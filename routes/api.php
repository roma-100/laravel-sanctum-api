<?php
//use App\Models\Operation;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Public routes
//Route::resource('operations', OperationController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/operations', [OperationController::class, 'index']);
Route::get('/operations/{id}', [OperationController::class, 'show']);
Route::get('/operations/search/{type}', [OperationController::class, 'search']);

/* Route::get('/operations', [OperationController::class, 'index']);
Route::get('/operations/{id}', [OperationController::class, 'show']);
Route::post('/operations', [OperationController::class, 'store']); */

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    //
    Route::post('/operations', [OperationController::class, 'store']);
    Route::put('/operations/{id}', [OperationController::class, 'update']);
    Route::delete('/operations/{id}', [OperationController::class, 'destroy']);
});

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
