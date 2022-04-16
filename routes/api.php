<?php

use App\Http\Controllers\API\AccountsControllerAPI;
use App\Http\Controllers\BigFlipCallbackController;
use App\Http\Controllers\BigFlipController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FbPController;
use App\Http\Controllers\ClosingRateController;
use App\Http\Controllers\OmsetController;
use App\Http\Controllers\UpsellingController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\API\UserPowerkertoController;
use App\Http\Controllers\API\UserInfoController;
use App\Http\Controllers\API\DashboardSuperAdminController;
use App\Http\Controllers\API\DashboardCRMController;
use App\Http\Controllers\API\LeadControllerAPI;
use App\Http\Controllers\API\UserControllerAPI;
use App\Http\Resources\Mobile\UserResource;

use App\Services\MidtransService;

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

Route::middleware('auth:api')->get('/pkl', function (Request $request) {
    return $request->user();
});

Route::post('register', [SuperAdminController::class, 'store'])->name('register');
Route::post('lead/{campaign}/{product}', [FbPController::class, 'lead'])->name('lead');
Route::post('lead_wa/{campaign}/{product}', [FbPController::class, 'lead_wa'])->name('lead_wa');
Route::post('closing_rate/{user}', [ClosingRateController::class, 'closing_rate'])->name('closing_rate');
Route::post('closing_rates/{campaign}/{product}/{user}', [ClosingRateController::class, 'closing_rates'])->name('closing_rates');
Route::post('omset/{campaign}/{product}/{user}', [OmsetController::class, 'omset'])->name('omset');
Route::get('all_omset', [OmsetController::class, 'all_omset'])->name('allOmset');
Route::get('omset_point', [OmsetController::class, 'omset_point'])->name('omsetPoint');
Route::post('upselling/{campaign}/{product}/{user}', [UpsellingController::class, 'upselling'])->name('upselling');
Route::get('all_upselling', [UpsellingController::class, 'all_upselling'])->name('allUpselling');
Route::get('upselling_point', [UpsellingController::class, 'upselling_point'])->name('upsellingPoint');
Route::post('inquiry', [BigFlipCallbackController::class, 'inquiry']);
Route::post('accept_payment', [BigFlipCallbackController::class, 'accept_payment']);
Route::post('disbursement', [BigFlipCallbackController::class, 'disbursement']);
Route::get('authentication', [BigFlipController::class, 'authentication']);
Route::get('balance', [BigFlipController::class, 'balance']);

Route::get('leads', [LeadController::class, 'index']);

//API route for register new user
Route::resource('userPWK', UserPowerkertoController::class);
Route::resource('userInfo', UserInfoController::class);

// Route::get('waiting_list', [DashboardSuperAdminController::class, 'waiting_list']);
Route::get('almost_expired', [DashboardSuperAdminController::class, 'almost_expired']);
Route::post('/update/aktive/{user}', [DashboardSuperAdminController::class, 'updateAktive']);
Route::post('/update/nonaktive/{user}', [DashboardSuperAdminController::class, 'updateNonAktive']);
Route::get('/sales_statistic', [DashboardSuperAdminController::class, 'sales_statistic']);

Route::get('/order', [DashboardCRMController::class, 'order']);

Route::post('login', [AccountsControllerAPI::class, 'login']);
Route::apiResource('/users', UserControllerAPI::class);
Route::middleware('auth:api')->group(function(){
    Route::get('leads', [LeadControllerAPI::class, 'index']);
    // Route::apiResource('/authors', AuthorsController::class);
    // Route::apiResource('/books', BooksController::class);
});

//Midtrans API
Route::group(['prefix'=>'payment', 'as'=>'payment.'], function() {
    Route::get('/', function(Request $request) {
        return response()->json('iniiii', 200);
    });
    Route::post('/token', function(Request $request) {
        $midtrans = new MidtransService();
        return response()->json($midtrans->getSnapToken($request->trxData), 200);
    });
    Route::get('/orderid', function() {
        return response()->json("BMX-ORD/".\Illuminate\Support\Carbon::now()->timestamp, 200);
    });
    Route::post('/update', function(Request $request) {
        $payment = Payment::where('transaction_id', $request->transaction_id)->first();
        $payment->transaction_status = $request->transaction_status;
        $payment->save();
        return response()->json("OK", 200);
    });
});

Route::post('user-register', [RegisterController::class, 'store']);

Route::post('/update/aktive_trx/', [DashboardSuperAdminController::class, 'updateAktiveByTrxId']);