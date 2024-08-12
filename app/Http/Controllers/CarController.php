<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Traits\Common;
use App\Models\Category;

class CarController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    { //المحاضرة 5
        // get all cars from database
        // return view all cars, cars data
        // select * from cars;
        //افترضي=موديل
       
        $cars = Car::get();
        //(اسم الملف, compact('الفيربول')):
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select ('id', 'category_name')->get();
        return view('add_car', compact('categories'));
        // $car = new Car();
        // return view('add_car', compact('car'));

    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {


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


    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    public function store(Request $request)
    {
        //صج
        $data = $request->validate([
            'carTitle' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
'category_id' => 'required|exists:categories,id',
        ]);
        $data['published'] = isset($request->published);
        $data['image'] = $this->uploadFile($request->image, 'assets/images/cars/');



        Car::create($data); // حفظ بيانات العربية في الداتابيس 
        return redirect()->route('cars.index');
    }




    ////////////////////////////////////////////////////////////////////////////



    ///
    // public function store(Request $request)
    // {صج
    //         $data = $request->validate([
    //             'carTitle' => 'required|string|max:255',
    //             'description' => 'required|string|max:1000',
    //             'price' => 'required|numeric',
    //             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         ]);

    // $car = new Car;
    // $car->carTitle = $data['carTitle'];
    // $car->description = $data['description'];
    // $car->price = $data['price'];
    // $car->published = $request->has('published');

    // // رفع الصورة وتخزينها
    // if ($request->hasFile('image')) {
    //     $imageName = time().'.'.$request->image->extension();
    //     $request->image->move(public_path('images'), $imageName);
    //     $car->image = $imageName;
    // }
    // $car->save();

    // return redirect()->route('cars.index');
    // }


    ///////////////////////////////////////////////////////////////////////////
    // public function store(Request $request)
    // {
    //صج
    //     $data = $request->validate([
    //         'carTitle' => 'required|string|max:255',
    //         'description' => 'required|string|max:1000',
    //         'price' => 'required|decimal:0,1',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     ]);

    //     $path = $request->file('image')->store('images', 'public');

    //     $car = new Car;
    //     $car->carTitle = $data['carTitle'];
    //     $car->description = $data['description'];
    //     $car->price = $data['price'];
    //     $car->image = $path;
    //     $car->published = $request->has('published');
    //     $car->save();

    //     return redirect()->route('cars.index');

    // }



    //////////////////////////////////////////////////////////////////////////////////////////////////

    // public function store(Request $request)
    //     {
    //        //صج
    //         $data = $request->validate([
    //             'carTitle' => 'required|string|max:255',
    //             'description' => 'required|string|max:1000',
    //             'price' => 'required|numeric', 
    //             'image' => 'required|mimes:png,jpg,jpeg|max:2048',
    //         ]);

    //         // تحديد قيمة 'published'
    //         $data['published'] = $request->has('published') ? 1 : 0;

    //         // معالجة رفع الصورة
    //         if ($request->hasFile('image')) {
    //             $file = $request->file('image');
    //             $fileName = time() . '.' . $file->getClientOriginalExtension();
    //             $file->move(public_path('uploads'), $fileName); 
    //             $data['image'] = 'uploads/' . $fileName; 
    //         }

    //         Car::create($data); // حفظ بيانات العربية في قاعدة البيانات

    //           return redirect()->route('cars.index');
    //     }



    //   // دالة لرفع الملفات
    //   protected function uploadFile(Request $request, $fieldName, $destination)
    //   {
    //       if ($request->hasFile($fieldName)) {
    //           $file = $request->file($fieldName);
    //           $filename = time() . '.' . $file->getClientOriginalExtension();
    //           $file->move($destination, $filename);
    //           return $filename;
    //       }
    //       return null;
    //   }
    ///////////////////////////////////////////////////////////////////////////




    // /**
    //  * Display the specified resource.
    //  */
    public function show(string $id)
    {
        //    $car=car::findOrFall($id)
        $car = Car::findOrFail($id);
         return view('car_details', compact('car'));
        // $categories = Category::select ('id', 'category_name')->get();
        // return view('car_details', compact('car', 'categories'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {           //=model
        // get data of car to be updated
        // select 

       
        $car = Car::findOrFail($id);
        $categories = Category::select ('id', 'category_name')->get();
        return view('edit_car', compact('car', 'categories'));
        // return "Data addad successfully $id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate([
            'carTitle' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
'category_id' => 'required|exists:categories,id',
        ]);
        $data['published'] = isset($request->published);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'assets/images/cars/');
        }
        Car::where('id', $id)->update($data);

        return redirect()->route('cars.index');
    }


    ////////////////////////

    //حل اخر
    // // التحقق من صحة البيانات 
    // $data = $request->validate([
    //     'carTitle' => 'required|string|max:255',
    //     'description' => 'required|string|max:1000',
    //     'price' => 'required|numeric',
    //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    // ]);

    // // البحث عن العربية وحدث بياناتها
    // $car = Car::findOrFail($id);
    // $car->carTitle = $data['carTitle'];
    // $car->description = $data['description'];
    // $car->price = $data['price'];
    // $car->published = $request->has('published');

    // // لو تم رفع صورة جديدة، احفظ الصورة وحدث البيانات
    // if ($request->hasFile('image')) {
    //     // حذف الصورة القديمة  إذا كانت موجودة
    //     if ($car->image && file_exists(public_path('images/' . $car->image))) {
    //         unlink(public_path('images/' . $car->image));
    //     }

    //     // رفع الصورة الجديدة
    //     $imageName = time().'.'.$request->image->extension();
    //     $request->image->move(public_path('images'), $imageName);
    //     $car->image = $imageName;
    // }

    // // حفظ التعديلات
    // $car->save();

    //    return redirect()->route('cars.index');


















    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // return "delete page";
        car::where('id', $id)->delete();
        // return "Data deleted successfully"; 
        return redirect()->route('cars.index');
    }











    public function showDeleted()
    {
        $cars = Car::onlyTrashed()->get();
        return view('trashedCars', compact('cars'));

        // return redirect()->route('cars.index');
    }



















    public function restore(string $id)
    {
        // return "delete page";
        car::where('id', $id)->restore();
        // return "Data deleted successfully"; 
        return redirect()->route('cars.showDeleted');
    }

    public function forceDelete(Request $request, string $id)
    {
        // return "delete page";
        car::where('id', $id)->forceDelete();
        return redirect()->route('cars.index');
    }
}
