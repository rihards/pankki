<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return redirect()->route('category.index');
});

// Categories
$app->get('category', [
    'as' => 'category.index', 'uses' => 'CategoryController@index'
]);
$app->get('category/create', [
    'as' => 'category.create', 'uses' => 'CategoryController@create'
]);
$app->post('category', [
    'as' => 'category.store', 'uses' => 'CategoryController@store'
]);
$app->get('category/{id}/edit', [
    'as' => 'category.edit', 'uses' => 'CategoryController@edit'
]);
$app->patch('category/{id}', [
    'as' => 'category.update', 'uses' => 'CategoryController@update'
]);
$app->get('category/{id}/delete', [
    'as' => 'category.delete', 'uses' => 'CategoryController@delete'
]);
$app->delete('category/{id}', [
    'as' => 'category.destroy', 'uses' => 'CategoryController@destroy'
]);

// Expenses
$app->get('expense', [
    'as' => 'expense.index', 'uses' => 'ExpenseController@index'
]);
$app->get('expense/create', [
    'as' => 'expense.create', 'uses' => 'ExpenseController@create'
]);
$app->post('expense', [
    'as' => 'expense.store', 'uses' => 'ExpenseController@store'
]);
$app->get('expense/{id}/edit', [
    'as' => 'expense.edit', 'uses' => 'ExpenseController@edit'
]);
$app->patch('expense/{id}', [
    'as' => 'expense.update', 'uses' => 'ExpenseController@update'
]);
$app->get('expense/{id}/delete', [
    'as' => 'expense.delete', 'uses' => 'ExpenseController@delete'
]);
$app->delete('expense/{id}', [
    'as' => 'expense.destroy', 'uses' => 'ExpenseController@destroy'
]);