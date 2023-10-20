<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Dentist;
use App\Models\Service;
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
        return view('admin.appointments', compact('appointments', 'dentists'));
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
    
    public function messages_view()
    {
        return view('admin.messages');
    }
}
