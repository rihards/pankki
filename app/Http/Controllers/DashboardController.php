<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Category;
use Illuminate\Http\Request;

/**
 * Class DashboardController
 *
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Lists latest ten examples.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $expenses = Expense::query()->with('category')->orderBy('created_at', 'desc')->take(10)->get();
        return view('dashboard.index', array('expenses' => $expenses));
    }

}