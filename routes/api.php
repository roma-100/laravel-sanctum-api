<?php
//use App\Models\Operation;
use App\Http\Controllers\OperationController;
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
Route::resource('operations', OperationController::class);
Route::post('/operations', [OperationController::class, 'store']);
Route::get('/operations/search/{type}', [OperationController::class, 'search']);
/* Route::get('/operations', [OperationController::class, 'index']);
Route::get('/operations/{id}', [OperationController::class, 'show']);
Route::post('/operations', [OperationController::class, 'store']); */

/* Route::post('/operations', function(){
    return Operation::create([ 
        'type' => 'type One',
        'name' => 'name-one',
        'slug' => 'slug-one',
        'description' => 'description-one',
        'usd' => '99.99',
    ]);
});
 */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
