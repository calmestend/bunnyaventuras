<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function create(Request $request) {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);

            if ($validate->fails()) {
                return redirect()->route('auth.register')
                    ->withErrors($validate)
                    ->withInput();
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('auth.login')
                ->with('status', 'User created successfully')
                ->with('token', $user->createToken('API TOKEN')->plainTextToken);

        } catch (\Throwable $throw) {
            return redirect()->route('auth.register')
                ->with('error', $throw->getMessage());
        }
    }

    public function login(Request $request) {
        try {
            $validate = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if ($validate->fails()) {
                return redirect()->route('auth.login')
                    ->withErrors($validate)
                    ->withInput();
            }

            if (Auth::attempt($request->only(['email', 'password']))) {
                $user = Auth::user();

                // Almacenar el ID del usuario en el session storage
                session(['user_id' => $user->id]);

                // Verifica si la sesión se almacena correctamente
                if (session()->has('user_id')) {
                    return redirect('/')->with('status', 'User logged in successfully');
                } else {
                    return redirect()->route('auth.login')->with('error', 'Failed to store user ID in session.');
                }
            } else {
                return redirect()->route('auth.login')
                    ->with('error', 'Email and password do not match')
                    ->withInput();
            }
        } catch (\Throwable $throw) {
            return redirect()->route('auth.login')
                ->with('error', $throw->getMessage());
        }
    }


    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return redirect('/')->with('status', 'User logged out successfully');
    }
}
