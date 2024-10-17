<?php

namespace App\Models\editor;

use App\Models\Menuscript;
use App\Models\SubmitPaper;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign_Reviewer extends Model
{
    use HasFactory;
    protected $table = "assign_reviewer";
    protected $fillable = [
        'menuscript_id',
        'assign_reviewer_id',
        'reviewer_remark',
        'reviewer_status',
        'file',
        'decision'
    ];

    public function get_menuscript()
    {
        return $this->hasOne(Menuscript:: class, 'id', 'menuscript_id');
    }

    public function submit_paper_data()
    {
        return $this->hasOne(SubmitPaper:: class, 'menuscript_id', 'menuscript_id');
    }



    public function get_user_name()
    {
        return $this->hasOne(User:: class, 'id', 'assign_reviewer_id');
    }

}
