<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function create(Request $request)
    {
        $photo = $request->file;

        $photoname = $photo != null ? time() . '.' . $photo->getClientOriginalExtension() : null;
        
        if ($photo != null)
        {
            $photoname = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move('services-images', $photoname);
        }

        $service = Service::create([
            'name' => $request->name,
            'duration' => $request->duration,
            'photo' => 'services-images/' . $photoname,
        ]);

        return redirect()->back()->with('message', 'Service created successfully');
    }

    public function update(Request $request)
    {
        $service = Service::find($request->id);
 
        $service->name = $request->name;
        $service->duration = $request->duration;

        $photo = $request->file;
        if ($photo != null)
        {
            $photoname = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move('services-images', $photoname);
            $service->photo = 'services-images/' . $photoname;
        }
        
        $service->save();

        return redirect()->back()->with('message', 'Service updated successfully');
    }

    public function delete(Request $request)
    {
        $service = Service::find($request->id);
 
        $service->delete();

        return redirect()->back()->with('message', 'Service deleted successfully');
    }
} 
