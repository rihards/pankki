<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Category;
use Illuminate\Http\Request;
use DB;

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
        // Monthly statistics / totals.
        $month = array(
            'total' => 0,
            'luxury' => 0,
            'regular' => 0,
        );

        $month_expenses = Expense::query()->with('category')->where(DB::raw('MONTH(created_at)'), '=', date('n'))->get();
        foreach($month_expenses as $expense) {
            $month['total'] += $expense->value;
            if($expense->category->luxury) {
                $month['luxury'] += $expense->value;
            }
        }
        $month['regular'] = $month['total'] - $month['luxury'];

        // Last 10 expenses.
        $expenses = Expense::query()->with('category')->orderBy('created_at', 'desc')->take(10)->get();
        return view('dashboard.index', array(
            'expenses' => $expenses,
            'month' => $month,
        ));
    }

}