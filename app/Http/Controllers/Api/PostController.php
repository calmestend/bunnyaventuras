<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function all() {
        try {
            $posts = Post::all();

            if ($posts->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => "Posts not found"
                ], 404);
            }

            $data = [
                'posts' => $posts,
                'status' => 200
            ];

            return response()->json($data, 200);

        } catch (\Throwable $throw) {
            return response()->json([
                'status' => false,
                'message' => $throw->getMessage()
            ], 500);
        }
    }

    public function create(Request $request) {
        try {
            $validate = Validator::make($request->all(), [
                'user_id' => 'required',
                'category_id' => 'required',
                'title' => 'required',
                'body' => 'required'
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validate->errors()
                ], 401);
            }

            Post::create([
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'body' => $request->body,
                'photo' => $request->photo
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Post created successfully',
            ], 200);

        } catch (\Throwable $throw) {
            return response()->json([
                'status' => false,
                'message' => $throw->getMessage()
            ], 500);
        }
    }
}
