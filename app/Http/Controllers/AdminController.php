<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Dentist;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard_view()
    {
        return view('admin.dashboard');
    }
    
    public function appointments_view()
    {
        $appointments = Appointment::orderby('start', 'desc')->get();
        $dentists = Dentist::all();
        $services = Service::all();
        $users = User::where('user_type', '0')->get();
        return view('admin.appointments', compact('appointments', 'dentists', 'services', 'users'));
    }
    
    public function dentists_view()
    {
        $dentists = Dentist::all();
        return view('admin.dentists', compact('dentists'));
    }
    
    public function services_view()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }
    
    public function users_view()
    {
        $users = User::where('user_type', '0')->get();
        return view('admin.users', compact('users'));
    }
    
    public function reviews_view()
    {
        $reviews = Review::all();
        return view('admin.reviews', compact('reviews'));
    }
    
    public function messages_view()
    {
        return view('admin.messages');
    }
}
