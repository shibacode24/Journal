<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menuscript;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin_dashboard()
    {
        $total_editor = User :: where('role','editor')
        ->count();
        
        $total_reviewer = User :: where('role','reviewer')
        ->count();

        $total_author = User :: where('role','author')
        ->count();

        $publish_menuscript = Menuscript :: where('publish_script','1')
        ->count();

        $withdrawal_menuscript = Menuscript :: where('withdrawal_status','1')
        ->count();

        $rejected_menuscript = Menuscript :: where('editor_status','Rejected')
        ->count();

        $pending_menuscript = Menuscript :: where('publish_script','0')
        ->count();
        return view('admin.dashboard',compact('total_editor','total_reviewer','total_author','withdrawal_menuscript','publish_menuscript','rejected_menuscript','pending_menuscript'));
    }
}
