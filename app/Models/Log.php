<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogModel extends Model
{
    use HasFactory;

    protected $table = 'log';

    public $fillable = [
        "id",
        "ip",
    ];

    public $timestamps = false;

}
