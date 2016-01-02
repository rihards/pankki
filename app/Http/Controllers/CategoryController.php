<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Validator;

/**
 * Class CategoryController
 *
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoryController constructor.
     *
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Lists all the categories.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->category->query()->get();
        return view('category.index', array('categories' => $categories));
    }

    /**
     * Shows the create new category page.
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Stores a category in the database.
     * @param Request $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), array(
            'name' => 'required',
        ));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = new $this->category;
        $category->name = $request->input('name');

        if(!empty($request->input('luxury')) && $request->input('luxury') == 'on')
        {
            $category->luxury = 1;
        }
        else
        {
            $category->luxury = 0;
        }
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Shows edit screen for a specific category.
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category = $this->category->query()->find($id);
        return view('category.edit', array('category' => $category));
    }

    /**
     * Updates a category.
     * @param Request $request
     * @param $id
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), array(
            'name' => 'required',
        ));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = $this->category->query()->find($id);
        $category->name = $request->input('name');

        if(!empty($request->input('luxury')) && $request->input('luxury') == 'on')
        {
            $category->luxury = 1;
        }
        else
        {
            $category->luxury = 0;
        }

        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Shows the delete confirmation page.
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $category = $this->category->query()->findOrFail($id);
        return view('category.delete', array('category' => $category));
    }

    /**
     * Removes the category.
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->category->query()->findOrFail($id)->delete();
        return redirect()->route('category.index');
    }
}