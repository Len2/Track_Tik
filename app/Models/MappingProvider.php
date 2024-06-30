<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MappingProvider extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_number',
        'column_name',
        'column_tracktik_payload'
    ];

    protected $table = 'mapping_providers';

    public $timestamps = false;

    public static function getProviderAttributesByProviderNumber(int $providerNumber): Collection
    {
        return DB::table('mapping_providers')
            ->where('provider_number', $providerNumber)
            ->get();
    }
}
