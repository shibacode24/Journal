<?php

namespace App\Models;

use App\Models\admin\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitPaper extends Model
{
    use HasFactory;
    protected $table = "submitpaper";
    protected $fillable = [
        'title',
        'category_id',
        'menuscript_id',
        'author',
        'affiliation',
        'email',
        'abstract',
        'keywords',
        'introduction',
        'results',
        'discussion',
        'materials_and_methods',
        'conclusion',
        'abbreviations',
        'declarations',
        'conflict_of_interests',
        'funding',
        'acknowledgment',
        'references',
        'image',
        'resubmitted_status'

    ];

    public function category()
    {
        return $this->HasOne(Category::class, 'id', 'category_id');
    }

    public function menuscipt_data()
    {
        return $this->hasOne(Menuscript::class, 'id', 'menuscript_id');
    }
}
