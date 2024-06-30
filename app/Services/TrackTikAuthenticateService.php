<?php

namespace App\Services;

use App\Models\Credential;
use App\Services\Interface\TrackTikAuthenticateInterface;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class TrackTikAuthenticateService implements TrackTikAuthenticateInterface
{

    public function authenticateTrackTik(): JsonResponse
    {
        try {
            $client = new Client();
            $credential = Credential::first();
            $url = env('TRACKTIK_OAUTH2') . '/access_token';
            $body = [
                'grant_type' => 'refresh_token',
                'refresh_token' => $credential->refresh_token,
                'client_id' => env('TRACKTIK_CLIENT_ID'),
                'client_secret' => env('TRACKTIK_CLIENT_SECRET')];

            $response = $client->request('POST', $url, ['json' => $body]);
            if ($response->getStatusCode() == 200) {
                $responseBody = json_decode($response->getBody()->getContents(), true);
                $credential->update([
                    'refresh_token' => $responseBody['refresh_token'],
                    'access_token' => $responseBody['access_token'],
                ]);
                return response()->json(['Your application is connect successfully on TrackTik APIs',$responseBody], 200);
            } else {
                return response()->json(['error' => 'Error with TrackTik API authentication: ' . $response->getBody()->getContents()], 404);
            }

        } catch (Exception $e) {
            Log::error('Error TracTik APIs: ' . $e->getMessage());
            return response()->json(['error' => 'Error TracTik APIs' . $e], 500);
        }
    }
}
