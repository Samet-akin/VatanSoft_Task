<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{
    use HasFactory , softDeletes;

    protected $table = 'users';

    public $fillable = [
        "adi",
        "soyadi",
        "sifre",
    ];

    public $timestamps = false;


}
