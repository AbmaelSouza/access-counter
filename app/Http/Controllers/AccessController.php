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
        $ipAddress = $request->header('x-real-ip') ?? $request->getClientIp();
        $city = $request->header('x-vercel-ip-city', 'Unknown');
        $region = $request->header('x-vercel-ip-country-region', 'Unknown');
        $country = $request->header('x-vercel-ip-country', 'Unknown');

        Access::create([
            'ip_address' => $ipAddress,
            'city' => $city,
            'region' => $region,
            'country' => $country,
        ]);

        return response()->json([
            'message' => 'Access recorded, your IP is ' . $ipAddress,
            'location' => [
                'city' => $city,
                'region' => $region,
                'country' => $country,
            ]
        ], 201);
    }
}
