<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {//المحاضرة 5
       // get all cars from database
        // return view all cars, cars data
        // select * from cars;
        //افترضي=موديل
        $cars= Car::get();
        //(اسم الملف, compact('الفيربول')):
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ادخال بيانات ثابته
        // dd($request);
        // $carTitle = 'BMW';
       
        // $description = "test";
        // $price = 12;
        // $published = true;

        // Car::create([
        //     'carTitle' => $carTitle,
            
        //     'description' => $description,
        //     'price' => $price,
        //     'published' => $published
        // ]);
        // return "Data addad successfully";
////////////////////////////////////////
// طريقة كبيرة للpublished

        // if(isset($request->published)){
        //     $pub = true;
        // }else{
        //     $pub = false;
        // }
////////////////////////////////////////////////////////////////////////////

 //المحاضرة 5 

// dd($request);
       $data=[
            //'k'= 'v'
        
'carTitle' =>$request->carTitle,
'description' =>$request->description,
'price' =>$request->price,
'published' =>isset($request->published),
//'published' =>pub,
        ];
        car::create($data);
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
    {           //=model
        // get data of car to be updated
        // select 
        $car = Car::findOrFail($id);
        return view('edit_car', compact('car'));
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
