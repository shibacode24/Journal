<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watermark extends Model
{
    use HasFactory;
    protected $table = "watermark";
    protected $fillable = [
        'watermark'
    ];
}
