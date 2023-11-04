<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'sex' => $request->sex == 'true' ? true : false,
            'address' => $request->address,
            'dental_history' => $request->dental_history,
            'medical_history' => $request->medical_history,
            'remarks' => $request->remarks,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->back()->with('message', 'User created successfully');
    }

    public function update(Request $request)
    {
        $dentist = User::find($request->id);
 
        $dentist->name = $request->name;
        $dentist->phone = $request->phone;
        $dentist->birthdate = $request->birthdate;
        $dentist->sex = $request->sex == 'true' ? true : false;
        $dentist->address = $request->address;
        $dentist->dental_history = $request->dental_history;
        $dentist->medical_history = $request->medical_history;
        $dentist->remarks = $request->remarks;
        
        $dentist->save();

        return redirect()->back()->with('message', 'User updated successfully');
    }
} 
