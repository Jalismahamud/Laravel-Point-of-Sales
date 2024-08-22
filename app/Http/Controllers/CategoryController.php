<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryPage()
    {
        return view('pages.dashboard.category-page');
    }
    public function CategoryList(Request $request)
    {
        $user_id = $request->header('id');
        return Category::where('user_id', $user_id)->get();
    }
    public function CategoryCreate(Request $request)
    {
        try {
            $user_id = $request->header('id');
            Category::create([
                'name' => $request->input('name'),
                'user_id' => $user_id
            ]);
            return  response()->json([
                'stutus' => 'success',
                'message' => 'Category created successfully'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'stutus' => 'error',
                'message' => $e->getMessage()
            ], 401);
        }
    }
    public function CategoryUpdate(Request $request)
    {
        try {
            $user_id = $request->header('user_id');
            $category_id = $request->input('id');
            Category::where('id', $category_id)->update([
                'name' => $request->input('name'),
            ]);
            return  response()->json([
                'stutus' => 'success',
                'message' => 'Category updated successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'stutus' => 'error',
                'message' => $e->getMessage()
            ], 401);
        }
    }
    public function CategoryDelete(Request $request)
    {
        try {
            $user_id = $request->header('id');
            $category_id = $request->input('id');
            Category::where('id', $category_id)->where('user_id', $user_id)->delete();
            return  response()->json([
                'stutus' => 'success',
                'message' => 'Category deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'stutus' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
