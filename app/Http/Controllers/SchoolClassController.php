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
    // {تصليح
        $SchoolClasses= SchoolClass::get();

        //VIEW(اسم الملف في الView); compact('$SchoolClassesهو ده')

        return view('SchoolClasses', compact('SchoolClasses'));
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
    $data=[
        //'k'= 'v'
     
     
    // تصليح
'name' =>$request->name,
'capacity' =>$request->capacity,
'is_fulled' =>$request->is_fulled=== 'ON' ? 1 : 0,
'price' =>($request->price),
'time_from' =>$request->time_from,
'time_to' =>($request->time_to),


    ];
    //model::create
    SchoolClass::create ($data);
    return "Data addad successfully";
  
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
        // تصليح
         //=model
       
        // get data of car to be updated
        // select 
        $SchoolClass = SchoolClass::findOrFail($id);
        return view('edit_class', compact('SchoolClass'));
        // return "Data addad successfully $id";
     
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
        



