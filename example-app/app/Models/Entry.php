<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'criterion1',
        'criterion2',
        'criterion3',
        'criteria1_name',
        'criteria1_weight',
        'criteria2_name',
        'criteria2_weight',
        'criteria3_name',
        'criteria3_weight',
        // Add more fields as necessary
    ];
}

