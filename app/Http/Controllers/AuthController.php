<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // Assuming you're using the User model for registration
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Show the signup form
    public function showSignupForm()
    {
        return view('employees.signup');
    }

    // Process the signup form submission
    public function processSignup(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'password' => 'required|min:6|confirmed',
            'img' => 'required|image|mimes:jpg,jpeg,png|max:2048',  // Validate image
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        // Handle image upload
        $image = $request->file('img');
        $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'images/' . $imageName;
        $image->move(public_path('images'), $imageName);

        // Create a new user record in the database
        User::create([
            'first_name' => $request->input('fname'),
            'last_name' => $request->input('lname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
            'pic' => $imagePath,  // Store the image path
        ]);

        // Redirect back with a success message
        return redirect()->route('signup')->with('msg', 'Signup successful');
    }
}
