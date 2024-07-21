<?php

namespace App\Http\Controllers;
use App\Models\SchoolClass;
use Illuminate\Http\Request;


class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //   dd($request);
       $name = 'math';
        $capacity = 3;
        $is_fulled = 'yas';
        $price = 177;
        $time_from = 12;
        $time_to = 15;

        SchoolClass::create ([
        // ($request->all());
       
            'name' => $name,
            'capacity' => $capacity,
            'is_fulled' => $is_fulled,
            'price' => $price,
            'time_from' => $time_from,
            'time_to' =>$time_to,
       ]);
       return 'Data added successfully';
//    $validatedData = $request->validate([
//         'name' => 'required|string|max:255',
//         'capacity' => 'required|integer',
//         'is_fulled' => 'nullable|boolean',
//         'price' => 'required|numeric',
//         'time_from' => 'required|date_format:H:i',
//         'time_to' => 'required|date_format:H:i',
//     ]);

    
//     SchoolClass::create($validatedData);

//     return redirect()->route('School-Classes.create')->with('success', 'Class added successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

   /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
} 
        



