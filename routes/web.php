<?php

use App\Http\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ProductController;
use App\Events\MessageCreated;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\BigFlipController;
use App\Http\Controllers\BudgetingController;
use App\Http\Controllers\BudgetingRealizationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ReimbursementController;
use App\Http\Controllers\CeoController;
use App\Http\Controllers\HumanResourceController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\InputerController;
use App\Http\Controllers\RajaOngkirController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ErrorPagesController;
use App\Http\Controllers\JuniorAdvController;
use App\Http\Controllers\ReportingController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\SyncController;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::get('/post/{post:slug}', [PostController::class, 'show']);
Route::get('/categories',[CategoryController::class,'index']);
Route::post('/resetPassword', [AccountsController::class, 'resetPassword']);
Route::post('/resetPassword', [AccountsController::class, 'resetPassword']);
Route::get('/ResetPwd/{token}', [AccountsController::class, 'resetPasswordForm'])->name('sendResetPassword');
Route::post('/ResetPwd/{token}', [AccountsController::class, 'submitResetPassword'])->name('submitResetPassword');


Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);

Route::post('/logout',[LoginController::class, 'logout']);

Route::resource('/register', RegisterController::class)->middleware('guest');

//Route::get('/dashboard', function () { return view('dashboard'); })->middleware('auth');

Route::resource('superadmin', SuperAdminController::class)->middleware('auth');
Route::post('/update/aktive/{user}', [SuperAdminController::class, 'updateAktive'])->name('updateAktive')->middleware('auth');
Route::post('/update/nonaktive/{user}', [SuperAdminController::class, 'updateNonAktive'])->name('updateNonAktive')->middleware('auth');

Route::get('/dashboard/blog/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/blog', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::resource('users', UserController::class)->middleware('auth');
Route::get('/viewprofile/{user}', [UserController::class, 'viewProfile'])->name('viewProfile')->middleware('auth');
Route::get('/status/update', [UserController::class, 'updateStatus'])->name('users.update.status')->middleware('auth');

Route::resource('/dashboard', DashboardController::class)->middleware('auth');
Route::get('/dailyWidget', [DashboardController::class, 'dailyWidget'])->name('dailyWidget');
Route::get('/weeklyWidget', [DashboardController::class, 'weeklyWidget'])->name('weeklyWidget');
Route::get('/monthlyWidget', [DashboardController::class, 'monthlyWidget'])->name('monthlyWidget');
Route::get('/WeeklyDashboard', [DashboardController::class, 'WeeklyDashboard'])->name('weeklydashboard')->middleware('auth');
Route::get('/MonthlyDashboard', [DashboardController::class, 'MonthlyDashboard'])->name('monthlydashboard')->middleware('auth');

Route::resource('/HumanResource', HumanResourceController::class)->middleware('auth');
Route::get('/DailyCheckin', [HumanResourceController::class, 'DailyCheckin'])->name('DailyCheckin')->middleware('auth');
Route::get('/LeaveApplication', [HumanResourceController::class, 'LeaveApplication'])->name('LeaveApplication')->middleware('auth');
Route::get('/CustomizeEmployeesData', [HumanResourceController::class, 'Customize'])->name('Customize')->middleware('auth');
Route::get('/EmployeesPayroll', [HumanResourceController::class, 'Payroll'])->name('Payroll')->middleware('auth');
Route::get('/HumanResource-Purchase', [HumanResourceController::class, 'hrPurchase'])->name('hrpurchase')->middleware('auth');

Route::get('/ld', [DashboardController::class, 'ld'])->name('dashboard.ld')->middleware('auth');

Route::get('/adv', [DashboardController::class, 'adv'])->name('advDashboard')->middleware('auth');
Route::get('/WeeklyADV', [DashboardController::class, 'WeeklyADV'])->name('WeeklyADV')->middleware('auth');
Route::get('/MonthlyADV', [DashboardController::class, 'MonthlyADV'])->name('MonthlyADV')->middleware('auth');

Route::resource('/JA-adv', JuniorAdvController::class)->middleware('auth');
Route::get('/JA-WeeklyADV', [JuniorAdvController::class, 'WeeklyJAADV'])->name('WeeklyJAADV')->middleware('auth');
Route::get('/JA-MonthlyADV', [JuniorAdvController::class, 'MonthlyJAADV'])->name('MonthlyJAADV')->middleware('auth');

Route::get('/cs', [DashboardController::class, 'cs'])->name('csDashboard')->middleware('auth');
Route::resource('/evaluation', EvaluationController::class)->middleware('auth');
// Route::get('/evaluation', [DashboardController::class, 'Evaluation'])->name('evaluation')->middleware('auth');
//Route::get('/dashboard',[UserController::class, 'index'])->middleware('auth');
Route::get('/myprofile',[UserController::class, 'index'])->middleware('auth');
Route::patch('/myprofile',[UserController::class, 'changePassword'])->name('changePassword')->middleware('auth');

Route::resource('announcements', AnnouncementController::class)->middleware('auth');

Route::resource('roles', RoleController::class)->middleware('auth');

Route::resource('statuses', StatusController::class)->middleware('auth');

Route::resource('product', ProductController::class)->middleware('auth');
Route::resource('lead', LeadController::class)->middleware('auth');

Route::resource('campaign', CampaignController::class)->middleware('auth');
Route::get('campaign/{campaign}', [CampaignController::class, 'addOperator'])->name('addOperator')->middleware('auth');
Route::post('campaign/{campaign}', [OperatorController::class, 'store'])->name('addOperator.store')->middleware('auth');
Route::delete('campaign/{campaign}/{operator}', [OperatorController::class, 'destroy'])->name('addOperator.destroy')->middleware('auth');

//Route::post("/campaign", [CampaignController::class, 'addMorePost']);

Route::resource('operator', OperatorController::class)->middleware('auth');
Route::get('/bigflip', [BigFlipController::class, 'index'])->middleware('auth')->name('flip');
Route::get('/AcceptPayment', [BigFlipController::class, 'AcceptPayment'])->middleware('auth')->name('bigflip.acceptpayment');

Route::get('getRole/{id}', function ($id) {
    $roles = App\Models\User::where('role_id',$id)->get();
    return response()->json($roles);
});

Route::get('ongkir', [RajaOngkirController::class, 'cek'])->name('ongkir');
Route::get('/province/{id}', [RajaOngkirController::class, 'get_province'])->name('get_province');
Route::get('/city/{id}', [RajaOngkirController::class, 'get_city'])->name('get_city');
Route::get('/subdistrict/{id}', [RajaOngkirController::class, 'get_subdistrict'])->name('get_subdistrict');

Route::get('leads/export', [LeadController::class, 'export'])->name('export-lead')->middleware('auth');
Route::get('leads/{lead}', [LeadController::class, 'changeStatus'])->name('changeStatus');
Route::get('inputer/export', [InputerController::class, 'export'])->name('export-inputer')->middleware('auth');
Route::get('inputer/export/{id}', [InputerController::class, 'exportOne'])->name('export-one-inputer')->middleware('auth');
// Route::get('send/{email}/{number}/{text}/{thanks}/{product}/{client}/{client_number}/{FU_text}/{operator}', [MailController::class, 'index'])->name('send');
Route::get('send/{email}/{number}/{campaign_id}/{product_id}/{lead_id}', [MailController::class, 'index'])->name('send');
Route::get('activation/{email}', [MailController::class, 'activation'])->name('activation');


Route::get('/closingcs', [BudgetingController::class, 'ClosingCS'])->name('closingcs')->middleware('auth');
Route::get('/budegetingadv', [BudgetingController::class, 'budgetingADV'])->name('budgetingadv')->middleware('auth');
Route::get('/finance', [BudgetingController::class, 'Finance'])->name('finance')->middleware('auth');

Route::get('/manager', [ManagerController::class, 'index'])->name('manager')->middleware('auth');
Route::get('/ManagerWeeklyDashboard', [ManagerController::class, 'WeeklyDashboard'])->name('Managerweeklydashboard')->middleware('auth');
Route::get('/ManagerMonthlyDashboard', [ManagerController::class, 'MonthlyDashboard'])->name('Managermonthlydashboard')->middleware('auth');

Route::get('/ceo', [CeoController::class, 'index'])->name('ceo')->middleware('auth');
Route::get('/CEOWeeklyDashboard', [CeoController::class, 'WeeklyDashboard'])->name('CEOweeklydashboard')->middleware('auth');
Route::get('/CEOMonthlyDashboard', [CeoController::class, 'MonthlyDashboard'])->name('CEOmonthlydashboard')->middleware('auth');

Route::get('/inputer', [InputerController::class, 'index'])->name('inputer')->middleware('auth');
Route::post('/inputer', [InputerController::class, 'addCS'])->name('inputer.addCS')->middleware('auth');
Route::delete('/inputer/{id}', [InputerController::class, 'CS_destroy'])->name('inputer.CS_destroy')->middleware('auth');
Route::get('/viewdata/{id}', [InputerController::class, 'view'])->name('viewdata')->middleware('auth');

Route::resource('reimbursement', ReimbursementController::class)->middleware('auth');
Route::resource('budgeting', BudgetingController::class)->middleware('auth');
Route::get('/downloaded/{file}', [BudgetingController::class, 'downloaded'])->name('downloaded');
Route::get('/budgetingreq', [BudgetingController::class, 'BudgetingReq'])->name('budgetingreq')->middleware('auth');
// Route::get('/budgetingrel', [BudgetingController::class, 'BudgetingRel'])->name('budgetingrel');
Route::resource('budgeting_realization', BudgetingRealizationController::class)->middleware('auth');
Route::get('/download/{file}', [BudgetingRealizationController::class, 'download'])->name('download');

Route::resource('promotion', PromotionController::class)->middleware('auth');
Route::get('lead/get_promotion_list/{product_name}', [PromotionController::class, 'get_promotion_list']);
Route::get('lead/get_promotion/{id}', [PromotionController::class, 'get_promotion'])->name('get_promotion');
Route::get('lead/get_product/{product_name}', [ProductController::class, 'get_product']);
Route::get('lead/get_product_promotion/{id}', [PromotionController::class, 'get_product_promotion'])->name('get_product_promotion');
Route::get('lead/get_shipping_promotion/{id}', [PromotionController::class, 'get_shipping_promotion'])->name('get_shipping_promotion');
Route::get('lead/get_admin_promotion/{id}', [PromotionController::class, 'get_admin_promotion'])->name('get_admin_promotion');
Route::get('ceo/approve/{id}', [CeoController::class, 'approve'])->name('ceo.approve')->middleware('auth');
Route::get('ceo/reject/{id}', [CeoController::class, 'reject'])->name('ceo.reject')->middleware('auth');
Route::get('manager/approve/{id}', [ManagerController::class, 'approve'])->name('manager.approve')->middleware('auth');
Route::get('manager/reject/{id}', [ManagerController::class, 'reject'])->name('manager.reject')->middleware('auth');

Route::get('/404', [ErrorPagesController::class, 'abort'])->name('error-404');

Route::get('/live-reporting',[ReportingController::class, 'index'])->name('reporting')->middleware('auth');
Route::get('/live-reporting/weekly',[ReportingController::class, 'weeklyReporting'])->name('reporting-weekly')->middleware('auth');
Route::get('/live-reporting/monthly',[ReportingController::class, 'monthlyReporting'])->name('reporting-monthly')->middleware('auth');

Route::resource('/warehouse', WarehouseController::class);

Route::resource('/courier', CourierController::class);

Route::get('/sync', [SyncController::class, 'tableClient']);
Route::get('/sync-inputer', [SyncController::class, 'tableInputer']);

Route::get('/sites/pwkmaintenance', function (){
    return Artisan::call('down');
});

Route::get('/getProduct/{campaign_id}', [DashboardController::class, 'getProduct']);
