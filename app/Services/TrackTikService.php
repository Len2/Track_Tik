<?php

namespace App\Services;
use App\Models\Credential;
use App\Models\MappingProvider;
use App\Services\Interface\TrackTikInterface;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class TrackTikService implements TrackTikInterface
{

    public function sendEmployeeToTrackTik($providerNumber,$employee): JsonResponse
    {
        try{
            $client = new Client();
            $headers = $this->setHeader();
            $body = $this->mapProviders($providerNumber,$employee);
            $url = env('TRACKTIK_URL') . '/employees';
            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'json' => $body
            ]);

            if ($response->getStatusCode() == 201) {
                return response()->json(json_decode($response->getBody()->getContents(), true), 201);
            } else {
                Log::error('Error with TrackTik API: ' . $response->getBody()->getContents());
                return response()->json(['error' => 'Error with TrackTik API: ' . $response->getBody()->getContents()], 500);
            }
        }catch (Exception $e) {
            Log::error('Error TracTik APIs: ' . $e->getMessage());
            return response()->json(['error' => 'Error TracTik APIs'.$e], 500);
        }
    }

    public function updateEmployeeToTrackTik($providerNumber,$employee): JsonResponse
    {
        try{
            $client = new Client();
            $headers = $this->setHeader();
            $body = $this->mapProviders($providerNumber,$employee);
            $url = env('TRACKTIK_URL') . '/employees/' . $employee->tracktik_id;
            $response = $client->request('PUT', $url, [
                'headers' => $headers,
                'json' => $body
            ]);
            return response()->json(json_decode($response->getBody()->getContents(), true), 201);
        }catch (Exception $e) {
            Log::error('Error TracTik APIs: ' . $e->getMessage());
            return response()->json(['error' => 'Error TracTik APIs'.$e], 500);
        }
    }

    private function setHeader(): array
    {
        $token = Credential::first()->access_token;
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$token,
        ];
    }
    private function mapProviders($providerNumber,$employee): array
    {
        $mappings = MappingProvider::getProviderAttributesByProviderNumber($providerNumber);
        $body = [];
        foreach ($mappings as $mapping) {
            $sourceColumnName = $mapping->column_name;
            $destinationColumnName = $mapping->column_tracktik_payload;
            $body[$destinationColumnName] = $employee->{$sourceColumnName};
        }
        return $body;
    }
}
