<?php

namespace Tests\Feature;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class TrackTikAuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_authenticate_tracktik_404()
    {
        Http::fake([
            env('TRACKTIK_OAUTH2') . '/access_token' => Http::response([
                'refresh_token' => 'no token',
                'access_token' => 'no token',
            ], 404),
        ]);
        $response = $this->postJson('/api/wrong-url/authenticate-tracktik');
        $response->assertStatus(404);
    }

    public function test_authenticate_tracktik_500_error()
    {
        Http::fake([
            env('TRACKTIK_OAUTH2') . '/access_token' => Http::response([
                'refresh_token' => 'no token',
                'access_token' => 'no token',
            ], 500),
        ]);
        $response = $this->postJson('http://localhost:8000/api/trackTik/auth');
        $response->assertStatus(500);
    }

    public function test_authenticate_tracktik_invalid_token_error()
    {
        Http::fake([
            env('TRACKTIK_OAUTH2') . '/access_token' => Http::response([
                'refresh_token' => 'def50200a1a29f3f31d691dd1ce0150102fd16a9a2f1e72178d6e30fd508145631cc9b0f56c2643f70835086bb333064c3eb70cf776f82fb4dd79ffef7e2e73c74c0e53de3e524f4a946db50f7c4c89ea48005cbb773c1eb5486674e2e4c3911f9b8376ae4c1b28e5dcae09e784bb275c6aeef6c3f97d821401754e1e744312fffc2722b97489f10087efb939a8b91488a2fdd215b8fc5f935218cc1d47177656eddee329e46dc853b4a44ff3aa3966eb12aeabbf60d0e10ef3e68b183ded87969bc40894b62607659219555b25a8a526096fdb63c2514cc90211c5b183c09436cb5179bc4fb08e7c5b05a3a44f12a0e40049ef8532e065c068e6b262491d3697c48adf8b0a98ec1507dc84476fd5c84853bb79b0ae54cb40e01b79f638d86d9a8166690217f7fe3343c05de17685898a764b215e7be6fa57b7adccb0a8f771ef6df3064631a04b93a183d7d426132bb4506599098d5f7c9f3981b227dc5cd5f19d6abd61a49a4f38acf3e2fcd9814a15be14f5deb1120924714dda87c76f507ca5afcc95f72a13401f27d573c2863ck3fb433e98c9afbf67d0a53308bb0c2375a071c1f830099bfaa298ba000236d5cdfe65ec73c10144501c1790fb83ef9ae94b4281c89958a455542980e6207',
                'access_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6IlJTMjU2LWN1cnJlbnQifQ.eyJhdWQiOiI3ZDBiZWJlMTliMDA1ZWViN2NjM2NmZGIiLCJqdGkiOiIyMWEwMTZkYjc3YTg1NTFhNmY3MWNjNTU3MmYzNGU0NmI1NDk0ODAyNGI3OTU2Yzk4M2E2NTliYTJjNTA4NGU5N2FiYjM1NmVmN2Q5NGIwMiIsImlhdCI6MTcxOTY4Nzk1MS4wMjI0NzksImlzcyI6InNtb2tlLnN0YWZmci5uZXQiLCJuYmYiOjE3MTk2ODc5NTEuMDIyNDg4LCJleHAiOjE3MTk2OTE1NTAsInN1YiI6IjMyNTQiLCJzY29wZXMiOlsib3BlbmlkIiwicHJvZmlsZSIsImNvcmU6ZW50aXRpZXM6ZW1wbG95ZWVzOnJlYWQiLCJjb3JlOmVudGl0aWVzOmVtcGxveWVlczp3cml0ZSJdfQ.lRdw6ADnz5E9fKcnJbB2KYBeu7egHn6fSoopewI5UssQQeYBSqLoTstvMkK2cLTmezOMsmd7n6Ui4j5UKIEHlrVTzUc45Kt1WdSdotSgVHGhM3m0GmTWaGrsN1JyyULiMVrnLET_5H4n8K6YuP1j8rgblx01EaSy8aBNy-AJm231PCcc4WfcoxVM80ak1cSxKaD9-5QPWFfrt2wORbQikLxNss-Qh5Kk6Xqtcj-x1AZPCtJTDiBZEsJBR-Aup7ma0e-WKl0M_Czq5ej5-PxvuUpKvzhRgPx3ZIuDu-c9j15r8M5oSsMhgneR9oeg8GNZS9i2TSFoek4oCGcUy5hwP6QDTAjwz_hsTfcP4pRSy2v0CjQVVDpdTDhRT4btbd1-EAgb5NvCYFv6tbodhyW2s0k7uAjLfmw4TKR8nQfab2k58UHrk9neES8trJjh1B4YDTdPDS7y83TzM8v8QlGvrhX4DH1eS2x-eO2Vj4Yf0y_h-653s8LNxN09CWEy86iGmPTijca0rBNN7Npqzoh11ZL2cC-XIxz70niLX8UP3RUm6Vrx5VXHdFUx-doOdjAlmL89uZfvJ9BU48pYBIKifjOv3xcq24LE6zObdne-sPWcmPyPYcu5P_POUWJkVmV1pW-0kU3WzZCfFVM5JdEzXbHhYOZIEcSohDQWlDzYF6I',
            ], 500),
        ]);
        $response = $this->postJson('http://localhost:8000/api/trackTik/auth');
        $response->assertInternalServerError(500);

    }
}
