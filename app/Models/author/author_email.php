<?php

namespace App\Models\author;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class author_email extends Model
{
    use HasFactory;
    protected $table = "emails";
    protected $fillable = [
        'user_id','to', 'subject', 'from', 'body',
    ];
}
