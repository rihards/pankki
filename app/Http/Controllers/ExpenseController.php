<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Category;
use Illuminate\Http\Request;
use Validator;

/**
 * Class ExpenseController
 *
 * @package App\Http\Controllers
 */
class ExpenseController extends Controller
{
    /**
     * @var Expense
     */
    private $expense;

    /**
     * ExpenseController constructor.
     *
     * @param Expense $expense
     */
    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
    }

    /**
     * Lists all the expenses.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $expenses = $this->expense->query()->with('category')->get();
        return view('expense.index', array('expenses' => $expenses));
    }

    /**
     * Shows the create new expense page.
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Let's get all the categories so we can pass those along.
        $categories = Category::all();
        return view('expense.create', array('categories' => $categories));
    }

    /**
     * Stores an expense in the database.
     * @param Request $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), array(
            'name' => 'required',
            'value' => 'required',
            'category' => 'required|exists:categories,id'
        ));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $expense = new $this->expense;
        $expense->name = $request->input('name');
        $expense->value = $request->input('value');
        $expense->description = $request->input('description');
        $expense->category_id = $request->input('category');
        $expense->save();
        return redirect()->route('expense.index');
    }

    /**
     * Shows edit screen for a specific expense.
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $expense = $this->expense->query()->find($id);
        return view('expense.edit', array('expense' => $expense));
    }

    /**
     * Updates an expense.
     * @param Request $request
     * @param $id
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), array(
            'name' => 'required',
            'value' => 'required',
            'category' => 'required|exists:categories,id'
        ));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $expense = $this->expense->query()->find($id);
        $expense->name = $request->input('name');
        $expense->value = $request->input('value');
        $expense->description = $request->input('description');
        $expense->category_id = $request->input('category');
        $expense->save();

        return redirect()->route('expense.index');
    }

    /**
     * Shows the delete confirmation page.
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $expense = $this->expense->query()->findOrFail($id);
        return view('expense.delete', array('expense' => $expense));
    }

    /**
     * Removes the expense.
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->expense->query()->findOrFail($id)->delete();
        return redirect()->route('expense.index');
    }
}