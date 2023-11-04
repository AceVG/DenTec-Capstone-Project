<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $review = Review::create([
            'user_id' => Auth::id(),
            'appointment_id' => $request->appointment_id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->back()->with('message', 'Review created successfully');
    }

    public function update(Request $request)
    {
        $review = Review::find($request->id);
 
        $review->rating = $request->rating;
        $review->review = $request->review;
        
        $review->save();

        return redirect()->back()->with('message', 'Review updated successfully');
    }

    public function delete(Request $request)
    {
        $review = Review::find($request->id);
 
        $review->delete();

        return redirect()->back()->with('message', 'Review deleted successfully');
    }
} 
