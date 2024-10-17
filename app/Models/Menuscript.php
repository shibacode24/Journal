<?php

namespace App\Models;

use App\Models\admin\Category;
use App\Models\editor\Assign_Reviewer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use PhpParser\Node\Stmt\Catch_;

class Menuscript extends Model
{
    use HasFactory;
    protected $table = "menuscript";
    protected $fillable = [
        'user_id',
        'unique_id',
        'category_id',
        'menuscript_title',
        'date_of_submission',
        'file',
        'assign_editor',
        'assign_status',
        'withdrawal_status',
        'editor_remark',
        'editor_status',
        'publish_script',
        'publish_date'
    ];

    public function category()
    {
        return $this->HasOne(Category::class, 'id', 'category_id');
    }

    public function submitted_paper()
    {
        return $this->HasOne(SubmitPaper::class, 'menuscript_id', 'id');
    }

    public function user_name()
    {
        return $this->HasOne(User::class, 'id', 'user_id');
    }

    public function assignReviewers()
    {
        return $this->hasMany(Assign_Reviewer::class, 'menuscript_id', 'id');
    }

    public function getReviewerIds()
    {
        return $this->assignReviewers()->pluck('assign_reviewer_id');
    }
}
