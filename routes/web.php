<?php

use App\Http\Controllers\SolutionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TakenSubjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::view('/login','userAuth.login')->name('userlogin');


//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [SubjectController::class,'subjectlist'])->name('dashboard');


//subject
Route::get('/new_subject',[SubjectController::class,'newsubject'])->name('snew');
Route::post('/sstore/{id}',[SubjectController::class,'add'])->name('sformulaire');

//details
Route::get('/subject_details/{id}',[SubjectController::class,'details'])->name('sdetails')->where(array('id'=>'[0-9]+'));
Route::get('/tsubject_details/{id}',[SubjectController::class,'sdetails'])->name('stdetails')->where(array('id'=>'[0-9]+'));
Route::get('/list',[SubjectController::class,'subjectlist'])->name('subjectlist');
Route::get('/list2',[SubjectController::class,'untakensubjectlist'])->name('untakensubjectlist');


Route::get('/update/{id}',[SubjectController::class,'update'])->name('smodification')->where(array('id'=>'[0-9]+'));//
Route::post('/updated/{id}',[SubjectController::class,'updated'])->name('smodifie')->where(array('id'=>'[0-9]+'));
Route::get('/delete_subject/{id}',[SubjectController::class,'deletefonction'])->name('sdelete')->where(array('id'=>'[0-9]+'));



//Route::get('/takesubject/[id,tn]',[TakenSubjectController::class,'add'])->name('savesubject');
Route::get('/takesubject/{id}',[TakenSubjectController::class,'add'])->name('savesubject');
Route::get('leavesubject/{id}',[TakenSubjectController::class,'leavesubject'])->name('leave')->where(array('id'=>'[0-9]'));

//task
Route::get('/new_task/{id}',[TaskController::class,'newtask'])->name('tnew');
Route::post('/tstore/{id}',[TaskController::class,'add'])->name('tformulaire');
//task's details
Route::get('/task_details/{id}',[TaskController::class,'details'])->name('tdetails')->where(array('id'=>'[0-9]+'));
//edit task
Route::get('/update_task/{id}',[TaskController::class,'update'])->name('tmodification')->where(array('id'=>'[0-9]+'));//
Route::post('/task_updated/{id}',[TaskController::class,'updated'])->name('tmodifie')->where(array('id'=>'[0-9]+'));


//solution
Route::get('/task_solution/{id}',[SolutionController::class,'newsolution'])->name('sonew');
Route::post('/sostore',[SolutionController::class,'add'])->name('soformulaire');
//solution's details
Route::get('/solution_details/{id}',[SolutionController::class,'details'])->name('sodetails')->where(array('id'=>'[0-9]+'));
Route::get('/ssolution_details/{id}',[SolutionController::class,'stdetails'])->name('ssodetails')->where(array('id'=>'[0-9]+'));
Route::post('/solution_point/{id}',[SolutionController::class,'savepoint'])->name('solutionpoint')->where(array('id'=>'[0-9]+'));

//edit task
