<?php

namespace App\Http\Controllers\TrackTikAuth;

use App\Http\Controllers\Controller;
use App\Services\TrackTikAuthenticateService;
use Illuminate\Http\JsonResponse;

class OAuth2Controller extends Controller
{
    protected TrackTikAuthenticateService $tikAuthenticateService;
    public function __construct(TrackTikAuthenticateService $tikAuthenticateService)
    {
        $this->tikAuthenticateService = $tikAuthenticateService;
    }
    public function authRefreshToken(): JsonResponse
    {
       return $this->tikAuthenticateService->authenticateTrackTik();
    }
}
