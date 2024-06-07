<?php

use App\Http\Controllers\AccessController;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::any('/access', [AccessController::class, 'store']);

Route::get('/', function () {
    // Get the current date and time
    $now = Carbon::now();

    // Get the date and time 30 days ago
    $thirtyDaysAgo = $now->subDays(30);

    // Count the total number of accesses in the last 30 days
    $accessCount = DB::table('accesses')
        ->where('created_at', '>=', $thirtyDaysAgo)
        ->count();

    // Count the number of unique IP addresses in the last 30 days
    $uniqueIpCount = DB::table('accesses')
        ->where('created_at', '>=', $thirtyDaysAgo)
        ->distinct('ip_address')
        ->count('ip_address');

    // Return the result
    return "You've had $accessCount accesses in the last 30 days from $uniqueIpCount unique IPs";
});
