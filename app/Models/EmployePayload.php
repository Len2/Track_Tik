<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployePayload extends Model
{
    use HasFactory;

    protected $table = 'employe_payload';
    protected $fillable = [
        'name',
        'data_type',
    ];
    public $timestamps = false;
}
