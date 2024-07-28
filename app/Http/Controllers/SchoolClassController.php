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
        $SchoolClasses = SchoolClass::get();

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
        $request->validate([
            'time_from' => 'required|date_format:H:i',
            'time_to' => 'required|date_format:H:i',
        ]);
        $data = [
            //'k'= 'v'


            'name' => $request->name,
            'capacity' => $request->capacity,
            'is_fulled' => isset($request->is_fulled),
            'price' => $request->price,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,


        ];
        //model::create
        SchoolClass::create($data);
        // return "Data addad successfully";
        return redirect()->route('SchoolClasses.index');
    }








    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $SchoolClass = SchoolClass::findOrFail($id);
        return view('SchoolClass_details', compact('SchoolClass'));
    }







    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        //=model

        // get data of car to be updated
        // select 
        $SchoolClass = SchoolClass::findOrFail($id);
        return view('edit_class', compact('SchoolClass'));
        // return "Data addad successfully $id";
        return redirect()->route('SchoolClasses.index');
    }







    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //   dd($request, $id);



        // $request->validate([
        //     'time_from' => 'required|date_format:H:i',
        //     'time_to' => 'required|date_format:H:i',
        // ]);

        $data = [
            'name' => $request->name,
            'capacity' => $request->capacity,
            'is_fulled' => isset($request->is_fulled),
            'price' => $request->price,
            // 'time_from' => 'required|date_format:H:i',
            // 'time_to' => 'required|date_format:H:i',
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
        ];

        SchoolClass::where('id', $id)->update($data);
        return redirect()->route('SchoolClasses.index');






        // $request->validate([
        //     'time_from' => 'required|date_format:H:i',
        //     'time_to' => 'required|date_format:H:i',
        // ]);

        // $data = [
        //     'name' => $request->name,
        //     'capacity' => $request->capacity,
        //     'is_fulled' => isset($request->is_fulled),
        //     'price' => $request->price,
        //     'time_from' => $request->time_from,
        //     'time_to' => $request->time_to,
        // ];

        // SchoolClass::where('id', $id)->update($data);
        // return redirect()->route('SchoolClasses.index');
    }







    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // return "delete page";
        SchoolClass::where('id', $id)->delete();
        // return "Data deleted successfully"; 
        return redirect()->route('SchoolClasses.index');
    }





    public function ShowDeleted()
    {
        $SchoolClasses = SchoolClass::onlyTrashed()->get();
        return view('trashedSchoolClasses', compact('SchoolClasses'));

        return redirect()->route('SchoolClasses.index');
    }
}
