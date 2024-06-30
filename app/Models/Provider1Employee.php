<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Provider1Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'email',
        'username',
        'sendToTrackTik',
        'tracktik_id',
    ];
}
