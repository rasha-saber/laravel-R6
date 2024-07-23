<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\SchoolClassController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('w', function () {
    return  "Hello laravel!!";
});

// Route::get('cars/{id?}', function ($id=0) {
//     return  "car number is ". $id;
// })->where([
//     'id' => '[0-9]+'
// ]);
// Route::get('cars/{id?}', function ($id=0) {
//     return  "car number is ". $id;
// })->whereNumber('id');
// Route::get('user/{name}/{age}', function($name, $age){
//     return "username is " . $name . " and age is " . $age;
// })->where([
//      'name'=>'[a-zA-Z]+',

//       'age' => '[0-9]+'

// ]);

// Route::get('user/{name}/{age?}', function($name, $age=0){
//     if($age==0){
//     return "username is " . $name ;
//      }
//      else{ 
//         return "username is " . $name .
//         " and age is " . $age;
//      }
// })->where(['name'=>'[a-zA-Z]+', 'age' => '[0-9]+']);

// Route::get('car/{name}', function($name){
   
//     return "name is" . $name ;
  
   
// })->whereIn('name',['b','m', 'h']);

// Route::prefix('company')->group(function(){
// Route::get('', function(){
   
//     return "company index" ;
//    });
//    Route::get('IT', function(){
   
//     return "company IT" ;
//    });
//    Route::get('USERS', function(){
   
//     return "company USERS" ;
//    });
// });


Route::prefix('accounts')->group(function(){
    Route::get('', function(){
       
        return "accounts BB" ;
       });
       Route::get('admin', function(){
       
        return "accounts admin" ;
       });
       Route::get('user', function(){
       
        return "accounts user" ;
       });
    });

    



Route::prefix('cars')->group(function() {
    Route::get('', function() {
        return "CarsMC";
   
    });
    Route::prefix('usa')->group(function() {
        Route::get('ford', function() {
            return "ford Car is made in usa";
        });

        Route::get('tesla', function() {
            return "tesla Car is made in usa";
        });
  
    });

    Route::prefix('ger')->group(function() {
        Route::get('mercedes', function() {
            return "mercedes Car is made in ger";
        });

        Route::get('Audi', function() {
            return "Audi Car is made in ger";
        });

        Route::get('volkswagen', function() {
            return "volkswagen Car is made in ger";
        });
    });
});

Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
//المحاضرة 5
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{id}', [CarController::class, 'edit'])->name('cars.edit');



//التاسك
Route::get('/contact', [ExampleController::class, 'index'])->name('contact.index');
Route::post('/contact', [ExampleController::class, 'contactsubmit'])->name('contact.submit');


///////////////////////////////////////////
Route::get('/School-Classes/create', [SchoolClassController::class, 'create'])->name('School-Classes.create');
Route::post('/School-Classes', [SchoolClassController::class, 'store'])->name('School-Classes.store');

// task5
 Route::get('/SchoolClasses', [SchoolClassController::class, 'index'])->name('SchoolClasses.index');
Route::get('/SchoolClasses/{id}', [SchoolClassController::class, 'edit'])->name('SchoolClasses.edit');