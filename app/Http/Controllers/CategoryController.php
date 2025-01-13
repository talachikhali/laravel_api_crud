<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $data = $categories->map(function($category){
            return [
                'name' => $category->name,
                'image' => $category->image
            ];
        });
        return response()->json(['message' => 'this is all categories', $categories], 200 );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'image' => 'required|image'
        ]);
        $category = Category::create($validateData);
        return response()->json(['message' => 'category has been created successfully', $category], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::where('id' , $id)->first();
        if(!$category){
        return response()->json(['message' => 'category not found'], 404);
        }
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();
        if(!$category){
            return response()->json(['message' => 'category was not found'], 404);
        }
        $validateData = $request->validate([
            'name' => 'string',
            'image' => 'image'
        ]);
        $category->update($validateData);
        
        return response()->json(['message' => 'category was updated successfully' , $category] , 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::where('id' , $id)->first();
        if(!$category){
            return response()->json(['message' => 'category not found'], 404);
        }
        $category->delete();
        return response()->json(['message' => 'category deleted successfully' , $category], 200);
    }
}
