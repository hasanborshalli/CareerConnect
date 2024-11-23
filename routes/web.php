<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class,'HomePage']);
Route::get('/home', [MainController::class,'HomePage']);

Route::get('/jobs', [MainController::class,'JobsPage']);
Route::get('/search/jobs', [JobController::class,'JobSearch']);
Route::get('/job/category', [JobController::class,'JobFilter']);

Route::get('/job/add', [MainController::class,'AddJobPage'])->middleware('is_company');
Route::post('/jobs/add', [JobController::class,'AddJob'])->middleware('is_company');

Route::get('/job/edit/{job}', [MainController::class,'EditJobPage'])->middleware('is_company')->middleware('can:update,job');
Route::post('/job/edit/{job}', [JobController::class,'EditJob'])->middleware('is_company')->middleware('can:update,job');

Route::get('/job/delete/{job}', [JobController::class,'DeleteJob'])->middleware('is_company')->middleware('can:update,job');

Route::get('/companies', [MainController::class,'CompaniesPage']);
Route::get('/search/companies', [MainController::class,'CompanySearch']);

Route::get('/applications/{job}', [MainController::class,'ApplicationsPage'])->middleware('is_company')->middleware('can:update,job');
Route::post('/job/apply/{job}', [JobController::class,'ApplyJob'])->middleware('is_seeker');

Route::get('/jobs/{job}', [MainController::class,'JobDetailsPage']);

Route::get('/user/{user}', [MainController::class,'UserPage'])->middleware('auth');
Route::get('/company/{user}', [MainController::class,'CompanyPage'])->middleware('auth');

Route::get('/user/edit/{user}', [MainController::class,'EditProfilePage'])->middleware('auth')->middleware('can:update,user');

Route::post('/editUser/part1/{user}', [UserController::class,'EditProfile1'])->middleware('auth')->middleware('can:update,user');
Route::post('/editUser/part2/{user}', [UserController::class,'EditProfile2'])->middleware('auth')->middleware('can:update,user');
Route::post('/editUser/part3/{user}', [UserController::class,'EditProfile3'])->middleware('auth')->middleware('can:update,user');
Route::post('/editUser/part4/{user}', [UserController::class,'EditProfile4'])->middleware('auth')->middleware('can:update,user');

Route::get('/company/edit/{user}', [MainController::class,'EditCompanyPage'])->middleware('auth')->middleware('can:update,user');

Route::post('/editCompany/part1/{user}', [UserController::class,'EditCompany1'])->middleware('auth')->middleware('can:update,user');
Route::post('/editCompany/part2/{user}', [UserController::class,'EditCompany2'])->middleware('auth')->middleware('can:update,user');
Route::post('/editCompany/part3/{user}', [UserController::class,'EditCompany3'])->middleware('auth')->middleware('can:update,user');
Route::post('/editCompany/part4/{user}', [UserController::class,'EditCompany4'])->middleware('auth')->middleware('can:update,user');

Route::get('/login', [MainController::class,'LoginPage'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class,'Login'])->middleware('guest');
Route::get('/logout', [AuthController::class,'Logout'])->middleware('auth');

Route::get('/signup', [MainController::class,'SignupPage'])->middleware('guest');
Route::get('/signup/step2/{role}', [MainController::class,'SignupStep2'])->middleware('guest');
Route::get('/signup/step3/{role}', [MainController::class,'SignupStep3'])->middleware('guest');

Route::post('/signup2', [AuthController::class,'signup2'])->middleware('guest');
Route::post('/signup3', [AuthController::class,'signup3'])->middleware('guest');

Route::get('/privacy', [MainController::class,'PrivacyPage']);
Route::get('/terms', [MainController::class,'TermsPage']);
Route::get('/FAQ', [MainController::class,'FaqPage']);