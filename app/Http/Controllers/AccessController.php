<?php

namespace App\Http\Controllers;

use App\Models\Access;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    /**
     * Handle the incoming request to add a new access entry.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $ipAddress = $request->header('X-Forwarded-For') ?? $request->getClientIp();
        Access::create(['ip_address' => $ipAddress]);

        return response()->json(['message' => 'Access recorded, your ip is ' . $ipAddress], 201);
    }
}
