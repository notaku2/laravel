<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersApiController;
use App\Http\Controllers\Api\TitlesApiController;
use App\Http\Controllers\Api\ChaptersApiController;
use App\Http\Controllers\Api\QuestionsApiController;
use App\Http\Controllers\Api\AnswersApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
/*
Route::group([
    'prefix' => 'v1', 
    'as' => 'api.', 
    'namespace' => 'Api\V1\Admin', 
    'middleware' => ['auth:api']
  ], function () {
      Route::apiResource('projects', 'ProjectsApiController');
  });
*/
/*
Route::group([
    'prefix' => 'swg', 
    'as' => 'api.', 
    'namespace' => 'Api', 
    'middleware' => ['auth:api']
  ], function () {
      Route::apiResource('users', 'UsersApiController');
      Route::apiResource('titles', 'TitlesApiController');
      Route::apiResource('chapters', 'ChaptersApiController');
      Route::apiResource('questions', 'QuestionsApiController');
      Route::apiResource('answers', 'AnswersApiController');
  });
*/
Route::apiResource('users', UsersApiController::class);
Route::apiResource('titles', TitlesApiController::class);
Route::apiResource('chapters', ChaptersApiController::class);
Route::apiResource('questions', QuestionsApiController::class);
Route::apiResource('answers', AnswersApiController::class);

Route::get('/test', function () {
  return response()->json(['message' => 'test'], 200);
});

