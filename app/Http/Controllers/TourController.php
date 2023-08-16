<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Exception;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tours = Tour::orderby('id','desc')->paginate(10);
        return view('tour.index', [
            'tours' => $tours,
            'request' => $request,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('tour.form', [
            'tours' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();
            Tour::create($attributes);
            $destination = base_path() . '/public/uploads';
            $request->file('image_path')->move($destination, $request->file('image_path')->getClientOriginalName());
            return redirect('tour');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        return view('tour.form', [
            'tour' => $tour,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
    {
        try {
            $attributes = $request->all();
            $tour->update($attributes);
            return redirect('tour');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        try {
            $tour->delete();
            return redirect('tour');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
