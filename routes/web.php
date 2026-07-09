<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\AuthController;

use App\Http\Controllers\DamageReportController;

use App\Http\Controllers\WorkOrderController;



/*
|--------------------------------------------------------------------------
| LANDING
|--------------------------------------------------------------------------
*/


Route::get('/', function () {

    return redirect('/login');

});





/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/


Route::get('/login', function () {

    return view('auth.login');

})->name('login');





Route::post('/login', [

    AuthController::class,

    'login'

])->name('login.process');





Route::post('/logout', [

    AuthController::class,

    'logout'

])->name('logout');







/*
|--------------------------------------------------------------------------
| AUTHENTICATED AREA
|--------------------------------------------------------------------------
*/


Route::middleware(['auth'])->group(function () {



    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ROLE
    |--------------------------------------------------------------------------
    */


    Route::get('/dashboard', function () {


    $user = auth()->user();


    $role = $user->role->name;



    switch($role){


        case 'student':
        case 'lecturer':


            $reports = \App\Models\DamageReport::where(
                'user_id',
                $user->id
            )
            ->latest()
            ->get();



            return view(
                'dashboard.index',
                compact('reports')
            );




        case 'admin_sarpras':


    $totalReports = \App\Models\DamageReport::count();



    $pendingReports = \App\Models\DamageReport::where(
        'status',
        'submitted'
    )->count();




    $validatedReports = \App\Models\DamageReport::where(
        'status',
        'validated'
    )->count();




    $activeOrders = \App\Models\WorkOrder::whereIn(
        'status',
        [
            'OPEN',
            'IN_PROGRESS'
        ]
    )->count();




    $completedOrders = \App\Models\WorkOrder::where(
        'status',
        'COMPLETED'
    )->count();




    $latestReports = \App\Models\DamageReport::with('user')
        ->latest()
        ->take(5)
        ->get();




    return view(
        'dashboard.admin',
        compact(
            'totalReports',
            'pendingReports',
            'validatedReports',
            'activeOrders',
            'completedOrders',
            'latestReports'
        )
    );




        case 'head_sarpras':


    $totalReports = \App\Models\DamageReport::count();



    $pendingReports = \App\Models\DamageReport::where(
        'status',
        'submitted'
    )->count();




    $validatedReports = \App\Models\DamageReport::where(
        'status',
        'validated'
    )->count();




    $activeWorkOrders = \App\Models\WorkOrder::whereIn(
        'status',
        [
            'OPEN',
            'IN_PROGRESS'
        ]
    )->count();




    $completedWorkOrders = \App\Models\WorkOrder::where(
        'status',
        'COMPLETED'
    )->count();





    $technicianPerformance = \App\Models\User::whereHas(
        'role',
        function($query){

            $query->where(
                'name',
                'technician'
            );

        }

    )
    ->withCount([

        'workOrders'

    ])
    ->get();





    $latestReports = \App\Models\DamageReport::with('user')

        ->latest()

        ->take(5)

        ->get();





    return view(

        'dashboard.head',

        compact(

            'totalReports',

            'pendingReports',

            'validatedReports',

            'activeWorkOrders',

            'completedWorkOrders',

            'technicianPerformance',

            'latestReports'

        )

    );




        case 'technician':

            return view(
                'dashboard.technician'
            );




        case 'leadership':


    $totalReports = \App\Models\DamageReport::count();



    $completedReports = \App\Models\DamageReport::where(
        'status',
        'completed'
    )->count();




    $activeReports = \App\Models\WorkOrder::whereIn(
        'status',
        [
            'OPEN',
            'IN_PROGRESS'
        ]
    )->count();





    $completionRate = $totalReports > 0

        ? round(
            ($completedReports / $totalReports) * 100
        )

        : 0;





    $monthlyReports = \App\Models\DamageReport::selectRaw(
        'strftime("%m", created_at) as month,
        count(*) as total'
    )
    ->groupBy('month')
    ->orderBy('month')
    ->get();






    $latestReports = \App\Models\DamageReport::with('user')

        ->latest()

        ->take(5)

        ->get();






    return view(

        'dashboard.leadership',

        compact(

            'totalReports',

            'completedReports',

            'activeReports',

            'completionRate',

            'monthlyReports',

            'latestReports'

        )

    );



        default:

            abort(403);


    }



})->name('dashboard');








    /*
    |--------------------------------------------------------------------------
    | DAMAGE REPORT
    |--------------------------------------------------------------------------
    */


    Route::get(

        '/reports',

        [DamageReportController::class,'index']

    )->name('reports.index');





    Route::get(

        '/reports/create',

        [DamageReportController::class,'create']

    )->name('reports.create');





    Route::post(

        '/reports',

        [DamageReportController::class,'store']

    )->name('reports.store');





    Route::post(

        '/reports/{id}/validate',

        [DamageReportController::class,'validateReport']

    )->name('reports.validate');

    /*
|--------------------------------------------------------------------------
| DAMAGE REPORT DETAIL
|--------------------------------------------------------------------------
*/


Route::get(
    '/reports/{id}',
    [
        DamageReportController::class,
        'show'
    ]
)
->name('reports.show');




/*
|--------------------------------------------------------------------------
| WORK ORDER MANAGEMENT
|--------------------------------------------------------------------------
*/


Route::get(
    '/work-orders',
    [
        WorkOrderController::class,
        'index'
    ]
)
->name('workorders.index');







    /*
    |--------------------------------------------------------------------------
    | WORK ORDER
    |--------------------------------------------------------------------------
    */



    Route::get(

        '/work-orders/create/{report_id}',

        [WorkOrderController::class,'create']

    )->name('workorders.create');





    Route::post(

        '/work-orders',

        [WorkOrderController::class,'store']

    )->name('workorders.store');









    /*
    |--------------------------------------------------------------------------
    | TECHNICIAN
    |--------------------------------------------------------------------------
    */



    Route::get(

        '/technician/tasks',

        [WorkOrderController::class,'myTasks']

    )->name('technician.tasks');





    Route::post(

        '/technician/tasks/{id}/status',

        [WorkOrderController::class,'updateStatus']

    )->name('technician.status');





});