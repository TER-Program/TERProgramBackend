<?php

use App\Http\Controllers\AspectController;
use App\Http\Controllers\AspectItemController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PerformanceGoalController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Responsible;
use App\Http\Middleware\Teacher;
use App\Models\Comment;
use App\Models\PerformanceGoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/aspectItem', [AspectItemController::class, 'index']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy']);



Route::middleware(['auth:sanctum', Admin::class])
    ->group(function () {
        Route::put('/updateUser/{id}', [UserController::class, 'update']);
        Route::get('/admin/users', [UserController::class, 'index']);
        Route::delete('/deleteUser/{id}', [UserController::class, 'destroy']);
        Route::post('/setRole/{id},{role}', [UserController::class, 'setRole']);
        Route::post('/performace_goals_fill/{id}', [PerformanceGoalController::class, 'performanceGoalFill']);
    });


Route::middleware(['auth:sanctum', Responsible::class])
    ->group(function () {
        Route::get('/performanceGoals', [PerformanceGoalController::class, 'getPerfomanceGoals']);
        Route::patch('/score/{id}/{score}/{evaluator}', [PerformanceGoalController::class, 'score']);
        Route::get('/aspects', [AspectController::class, 'index']);
        Route::get('/scorebyteacher', [PerformanceGoalController::class, 'scoreByTeacher']);
        Route::post('/comment/{goal}/{text}', [CommentController::class, 'comment']);
        Route::get('/teachers', [UserController::class, 'teachers']);
        Route::get('/document', [DocumentController::class, 'getDocumentum']);
    });


Route::middleware(['auth:sanctum', Teacher::class])
    ->group(function () {
        Route::post('/newDocument', [DocumentController::class, 'store']);
        Route::get('/getGoalsByUserId/{id}', [PerformanceGoalController::class, 'getGoalsById']);
        Route::get('/role', [UserController::class, 'role']);
        Route::get('/goals', [PerformanceGoalController::class, 'getGoals']);
        Route::post('/upload-pdf', [DocumentController::class, 'store']);
        Route::get('/documentbyid/{id}', [DocumentController::class, 'getDocumentumById']);
        Route::get('/documents/{documentId}', [DocumentController::class, 'getDocumentFile']);
        Route::delete('/deletedocument/{id}' , [DocumentController::class, 'destroy']);
    });
