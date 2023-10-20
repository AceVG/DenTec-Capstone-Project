<?php

namespace App\Http\Controllers;

use App\Models\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DentistController extends Controller
{
    public function create(Request $request)
    {
        $dentist = Dentist::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        return redirect()->back()->with('message', 'Dentist created successfully');
    }

    public function update(Request $request)
    {
        $dentist = Dentist::find($request->id);
 
        $dentist->name = $request->name;
        $dentist->phone = $request->phone;
        $dentist->email = $request->email;
        
        $dentist->save();

        return redirect()->back()->with('message', 'Dentist updated successfully');
    }

    public function delete(Request $request)
    {
        $dentist = Dentist::find($request->id);
 
        $dentist->delete();

        return redirect()->back()->with('message', 'Dentist deleted successfully');
    }
} 
