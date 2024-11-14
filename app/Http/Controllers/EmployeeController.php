<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    // Show the employee signup form
    public function showSignupForm()
    {
        return view('employees.signup');
    }

    // Process the signup form submission
    public function processSignup(Request $request)
    {
        // Validate the form input
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|numeric',
            'password' => 'required|min:6',
            'pic' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // optional profile picture upload
            'hire_date' => 'required|date',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle the profile picture upload (if any)
        $imagePath = null;
        if ($request->hasFile('pic')) {
            $image = $request->file('pic');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'images/employees/' . $imageName;
            $image->move(public_path('images/employees'), $imageName);
        }

        // Store the employee data in the database
        Employee::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')), // Encrypt the password
            'pic' => $imagePath,
            'hire_date' => $request->input('hire_date'),
        ]);

        // Redirect with success message
        return redirect()->route('employee.signup')->with('msg', 'Employee registered successfully!');
    }

    public function showLoginForm()
    {
        return view('employees.login');  // The view we just created
    }
    public function dashboard()
    {
        // Return the employee dashboard view
        return view('employees.dashboard');  // Make sure you have the correct view
    }
    // Handle employee login request
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the employee exists in the database
        $employee = Employee::where('email', $request->email)->first();

        if ($employee && Hash::check($request->password, $employee->password)) {
            // Authentication successful: Log the employee in (use session or custom login logic)
            Session::put('employee_id', $employee->id);

            // Redirect to the employee dashboard
            return redirect()->route('employee.dashboard');
        }

        // If authentication fails
        return back()->with('error', 'Invalid email or password');
    }

    // Handle employee logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('employee.login');
    }
}
