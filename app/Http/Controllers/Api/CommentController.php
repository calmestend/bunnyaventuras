<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function create(Request $request) {
        try {
            $validate = Validator::make($request->all(), [
                'post_id' => 'required',
                'user_id' => 'required',
                'content' => 'required'
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validate->errors()
                ], 401);
            }

            Comment::create([
                'post_id' => $request->post_id,
                'user_id' => $request->user_id,
                'content' => $request->content,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Comment created successfully',
            ], 200);


        } catch (\Throwable $throw) {
            return response()->json([
                'status' => false,
                'message' => $throw->getMessage()
            ], 500);
        }
    }
}
