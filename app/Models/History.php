<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';

    // Define fillable columns if needed
    protected $fillable = [
        'action',
        'table_name',
        'user_id',
        'data_id',
        'action_time',
    ];
}
