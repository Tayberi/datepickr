<?php

use App\Http\Controllers\Api\V1\Admin\EventApiController;
use App\Http\Controllers\Api\V1\Admin\ResourceApiController;
use App\Http\Controllers\Api\V1\Admin\StudioApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Resource
    Route::apiResource('resources', ResourceApiController::class);

    // Studio
    Route::apiResource('studios', StudioApiController::class);

    // Event
    Route::apiResource('events', EventApiController::class);
});
