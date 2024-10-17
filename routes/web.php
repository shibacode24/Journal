<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\EditorController;
use App\Http\Controllers\admin\FooterController;
use App\Http\Controllers\admin\HeaderController;
use App\Http\Controllers\admin\WatermarkController;
use App\Http\Controllers\author\AuthorController;
use App\Http\Controllers\editor\EditorPanelController;
use App\Http\Controllers\MenuscriptController;
use App\Http\Controllers\reviewer\ReviewerController;
use App\Http\Controllers\SubmitPaperController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::view('admin_dashboard','admin.dashboard')->name('admin_dashboard');


Route::view('test_js','test_js')->name('test_js');




// website static pages -----------------------------------------------------------
Route::view('website_login','website.login')->name('website_login');
Route::view('about','website.about_the_journal')->name('about');
Route::view('aim_and_scope','website.aim_and_scope')->name('aim_and_scope');
// Route::view('details','website.details')->name('details');
Route::view('index','website.index')->name('index');
Route::view('policies','website.policies')->name('policies');
Route::view('publication_charge','website.publication_charge')->name('publication_charge');
Route::view('contact','website.contact')->name('contact');


Route::get('details/{id}',[WebsiteController::class,'details'])->name('details');
Route::get('index',[WebsiteController::class,'index'])->name('index');
Route::get('get_search',[WebsiteController::class,'get_search'])->name('get_search');
Route::get('search',[WebsiteController::class,'search'])->name('search');
Route::get('download/{id}',[WebsiteController::class,'download'])->name('download');

// end --------------------------------------------------------------------------------

Route::view('login','login');

// Route::view('menuscript_pdf','menuscript_pdf');

// Route::view('website.search_result','search_result');
// Route::view('search_result','website.search_result');

// Route::view('create_account','create_account')->name('create_account');

Route::get('submit_paper',[SubmitPaperController::class,'submit_paper'])->name('submit_paper');
Route::post('store_paper',[SubmitPaperController::class,'storePaper'])->name('store_paper');
Route::get('edit_menuscript/{id}',[AuthorController::class,'edit_menuscript'])->name('edit_menuscript');
Route::get('edit_menuscript_for_editor/{id}',[AuthorController::class,'edit_menuscript_for_editor'])->name('edit_menuscript_for_editor');
Route::post('update_paper',[AuthorController::class,'UpdatePaper'])->name('update_paper');
Route::post('update_paper_for_editor',[AuthorController::class,'UpdatePaper_for_editor'])->name('update_paper_for_editor');

Route::get('create_account',[LoginController::class,'create_account'])->name('create_account');
Route::post('create_account_store',[LoginController::class,'store'])->name('create_account_store');



Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('check_login',[LoginController::class,'check_login'])->name('check_login');
Route::get('log_out',[LoginController::class,'log_out'])->name('log_out');



Route::group(['middleware'=>'CheckLogin'],function(){

Route::get('admin_dashboard',[DashboardController::class,'admin_dashboard'])->name('admin_dashboard');

Route::get('category',[CategoryController::class,'category'])->name('category');
Route::post('create_category',[CategoryController::class,'create_category'])->name('create_category');
Route::get('edit_category/{id}',[CategoryController::class,'edit_category'])->name('edit_category');
Route::post('update_category',[CategoryController::class,'update_category'])->name('update_category');
Route::get('delete_category/{id}',[CategoryController::class,'delete_category'])->name('delete_category');

Route::get('footer',[FooterController::class,'footer'])->name('footer');
Route::post('create_footer',[FooterController::class,'create_footer'])->name('create_footer');
Route::get('edit_footer/{id}',[FooterController::class,'edit_footer'])->name('edit_footer');
Route::post('update_footer',[FooterController::class,'update_footer'])->name('update_footer');
Route::get('delete_footer/{id}',[FooterController::class,'delete_footer'])->name('delete_footer');


Route::get('header',[HeaderController::class,'header'])->name('header');
Route::post('create_header',[HeaderController::class,'create_header'])->name('create_header');
Route::get('edit_header/{id}',[HeaderController::class,'edit_header'])->name('edit_header');
Route::post('update_header',[HeaderController::class,'update_header'])->name('update_header');
Route::get('delete_header/{id}',[HeaderController::class,'delete_header'])->name('delete_header');

Route::get('watermark',[WatermarkController::class,'watermark'])->name('watermark');
Route::post('create_watermark',[WatermarkController::class,'create_watermark'])->name('create_watermark');
Route::get('edit_watermark/{id}',[WatermarkController::class,'edit_watermark'])->name('edit_watermark');
Route::post('update_watermark',[WatermarkController::class,'update_watermark'])->name('update_watermark');
Route::get('delete_watermark/{id}',[WatermarkController::class,'delete_watermark'])->name('delete_watermark');


Route::get('editor',[EditorController::class,'editor'])->name('editor');
Route::post('create_editor',[EditorController::class,'create_editor'])->name('create_editor');
Route::get('edit_editor/{id}',[EditorController::class,'edit_editor'])->name('edit_editor');
Route::post('update_editor',[EditorController::class,'update_editor'])->name('update_editor');
Route::get('delete_editor/{id}',[EditorController::class,'delete_editor'])->name('delete_editor');

Route::get('menuscript',[MenuscriptController::class,'menuscript'])->name('menuscript');
Route::post('create_menuscript',[MenuscriptController::class,'create_menuscript'])->name('create_menuscript');

Route::get('get_author',[MenuscriptController::class,'get_author'])->name('get_author');
Route::get('get_reviewer',[MenuscriptController::class,'get_reviewer'])->name('get_reviewer');
Route::get('reviewer_status',[MenuscriptController::class,'reviewer_status'])->name('reviewer_status');
Route::get('author_status',[MenuscriptController::class,'author_status'])->name('author_status');
Route::get('all_menuscript',[MenuscriptController::class,'all_menuscript'])->name('all_menuscript');

Route::get('assign_editor',[MenuscriptController::class,'assign_editor'])->name('assign_editor');
Route::get('withdrawal',[MenuscriptController::class,'withdrawal_list'])->name('withdrawal');


Route::get('editor_menuscript',[EditorPanelController::class,'editor_menuscript'])->name('editor_menuscript');
Route::post('assign_reviewer',[EditorPanelController::class,'assign_reviewer'])->name('assign_reviewer');
Route::get('assigned_menuscript',[EditorPanelController::class,'assigned_menuscript'])->name('assigned_menuscript');
Route::get('editor_dashboard',[EditorPanelController::class,'editor_dashboard'])->name('editor_dashboard');
Route::get('get_reviewer_status_tracker',[EditorPanelController::class,'get_reviewer_status_tracker'])->name('get_reviewer_status_tracker');
Route::post('update_editor_status',[EditorPanelController::class,'update_editor_status'])->name('update_editor_status');
Route::get('pending_for_publish_approval',[EditorPanelController::class,'pending_for_publish_approval'])->name('pending_for_publish_approval');
Route::get('publish_menuscript',[EditorPanelController::class,'publish_menuscript'])->name('publish_menuscript');
Route::get('editor_notification',[EditorPanelController::class,'editor_notification'])->name('editor_notification');
Route::post('publish',[EditorPanelController::class,'publish'])->name('publish');


Route::get('reviewer_dashboard',[ReviewerController::class,'reviewer_dashboard'])->name('reviewer_dashboard');
Route::get('assign_all_menuscript',[ReviewerController::class,'assign_all_menuscript'])->name('assign_all_menuscript');
Route::get('add_remark/{id}',[ReviewerController::class,'add_remark'])->name('add_remark');
Route::post('reviewer_decision',[ReviewerController::class,'reviewer_decision'])->name('reviewer_decision');
Route::get('reviewer_notification',[ReviewerController::class,'reviewer_notification'])->name('reviewer_notification');
Route::get('get_pdf/{id}',[ReviewerController::class,'get_pdf'])->name('get_pdf');



Route::get('author_dashboard',[AuthorController::class,'author_dashboard'])->name('author_dashboard');
Route::get('add_menuscript',[AuthorController::class,'add_menuscript'])->name('add_menuscript');
Route::get('upload_menuscript',[AuthorController::class,'upload_menuscript'])->name('upload_menuscript');
Route::get('added_menuscript',[AuthorController::class,'added_menuscript'])->name('added_menuscript');
Route::get('author_notification',[AuthorController::class,'author_notification'])->name('author_notification');
Route::post('author_create_menuscript',[AuthorController::class,'author_create_menuscript'])->name('author_create_menuscript');
Route::get('withdraw_script/{id}',[AuthorController::class,'withdraw_script'])->name('withdraw_script');
Route::get('published_menuscript',[AuthorController::class,'published_menuscript'])->name('published_menuscript');
Route::get('get_status_tracker_for_author',[AuthorController::class,'get_status_tracker_for_author'])->name('get_status_tracker_for_author');
Route::get('rejected_menuscript',[AuthorController::class,'rejected_menuscript'])->name('rejected_menuscript');




});

Route::get('get_menuscript/{id}',[MenuscriptController::class,'get_menuscript'])->name('get_menuscript');