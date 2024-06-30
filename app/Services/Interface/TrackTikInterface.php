<?php

namespace App\Services\Interface;
use Illuminate\Http\JsonResponse;

interface TrackTikInterface
{
    public function sendEmployeeToTrackTik($providerNumber, $employee):JsonResponse;
    public function updateEmployeeToTrackTik($providerNumber, $employee):JsonResponse;
}
