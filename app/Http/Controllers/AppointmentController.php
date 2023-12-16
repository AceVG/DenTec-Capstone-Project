<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function view()
    {
        $appointments = Appointment::where('user_id', Auth::id())->orderby('start', 'desc')->get();
        $services = Service::all();

        $appointmentIds = $appointments->pluck('id')->toArray();
        $reviews = Review::whereIn('appointment_id', $appointmentIds)->get();

        return view('public.appointment', compact('appointments', 'services', 'reviews'));
    }

    public function create(Request $request)
    {
        $user = User::find($request->user_id == null ? Auth::user()->user_type != '1' ? Auth::id() : null : $request->user_id);
        $service = Service::find($request->service_id);
        $appointment = Appointment::create([
            'name' => $request->name == null ? $user->name : $request->name,
            'email' => $request->email == null ? $user->email : $request->email,
            'phone' => $request->phone == null ? $user->phone : $request->phone,
            'notes' => $request->notes,
            'reason' => $request->reason,
            'start' => $request->start,
            'end' => Carbon::parse($request->start)->addHours($service->duration),
            'status' => $request->status == null ? 'Pending' : $request->status,
            'user_id' => $request->user_id == null ? $user != null ? $user->id : null : $request->user_id,
            'service_id' => $request->service_id,
        ]);

        return redirect()->back()->with('message', 'Appointment created successfully');
    }

    public function update(Request $request)
    {
        $appointment = Appointment::find($request->id);
 
        $appointment->dentist_id = $request->dentist_id;
        $appointment->status = $request->status;
        $appointment->reason = $request->reason;
        
        $appointment->save();

        return redirect()->back()->with('message', 'Appointment updated successfully');
    }
} 
