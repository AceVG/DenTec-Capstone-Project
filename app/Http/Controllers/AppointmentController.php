<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function view()
    {
        $appointments = Appointment::where('user_id', Auth::id())->orderby('start', 'desc')->get();
        $services = Service::all();

        return view('public.appointment', compact('appointments', 'services'));
    }

    public function create(Request $request)
    {
        $service = Service::find($request->service_id);
        $appointment = Appointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'start' => $request->start,
            'end' => Carbon::parse($request->start)->addHours($service->duration),
            'status' => 'Pending',
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
        ]);

        return redirect()->back()->with('message', 'Appointment created successfully');
    }

    public function update(Request $request)
    {
        $appointment = Appointment::find($request->id);
 
        $appointment->dentist_id = $request->dentist_id;
        $appointment->status = $request->status;
        
        $appointment->save();

        return redirect()->back()->with('message', 'Appointment updated successfully');
    }
} 
