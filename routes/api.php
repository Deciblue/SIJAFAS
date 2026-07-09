<?php


use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\AuthController;

use App\Http\Controllers\Api\DamageReportController;

use App\Http\Controllers\Api\WorkOrderController;



Route::prefix('v1')->group(function(){



Route::post(
'/login',
[
AuthController::class,
'login'
]
);




Route::middleware('auth:sanctum')->group(function(){



Route::get(
'/me',
[
AuthController::class,
'me'
]
);



Route::post(
'/logout',
[
AuthController::class,
'logout'
]
);





Route::get(
'/reports',
[
DamageReportController::class,
'index'
]
);



Route::post(
'/reports',
[
DamageReportController::class,
'store'
]
);





Route::get(
'/technician/tasks',
[
WorkOrderController::class,
'technicianTasks'
]
);



Route::post(
'/technician/tasks/{id}/status',
[
WorkOrderController::class,
'updateStatus'
]
);



});


});