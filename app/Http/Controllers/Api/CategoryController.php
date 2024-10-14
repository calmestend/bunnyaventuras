<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function create(Request $request) {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required|unique:categories,name'
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validate->errors()
                ], 401);
            }

            Category::create([
                'name' => $request->name
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Category created successfully',
            ], 200);


        } catch (\Throwable $throw) {
            return response()->json([
                'status' => false,
                'message' => $throw->getMessage()
            ], 500);
        }
    }
}
