<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class CategoriesController extends Controller
{
    private $categories;
    public function __construct()
    {
        $this->categories = new Category();
    }

    public function index()
    {
        $categories = $this->categories->getAllCategory();
        //    dd($categories);
        return view('admin.categories', ['categories' => $categories, 'UI' => 'categories']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $this->categories->addCategory($request);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function delete($id)
    {
        $this->categories->deleteCategory($id);
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'categoryName' => 'required',
        ]);
        $this->categories->updateCategory($request, $id);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }


    public function edit($id)
    {
        $category = $this->categories->getCategory($id);
        return response()->json($category);
    }

    public function getCategories(Request $request)
    {
        // Lấy danh sách các ID của category từ request
        $categoryIds = $request->input('category_ids');

        // Truy vấn CSDL để lấy các category mà user muốn xem
        $categories = Category::whereIn('id', $categoryIds)->get();

        // Trả về danh sách category dưới dạng JSON
        return response()->json(['categories' => $categories]);
    }  
}
