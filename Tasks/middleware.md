  <!-- ملاحظةاستخدمت ال 
Aiفي التنسيق فقط  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Middleware and Laravel Tutorial</title>
</head>
<body>

<h1>What is Middleware?</h1>
<p>
Middleware is software that lies between an operating system and the applications running on it. Essentially functioning as a hidden translation layer, middleware enables communication and data management for distributed applications. It’s sometimes called plumbing, as it connects two applications together so data and databases can be easily passed between the “pipe.” Using middleware allows users to perform such requests as submitting forms on a web browser, or allowing the web server to return dynamic web pages based on a user’s profile.
</p>
<p>
Common middleware examples include database middleware, application server middleware, message-oriented middleware, web middleware, and transaction-processing monitors. Each program typically provides messaging services so that different applications can communicate using messaging frameworks like Simple Object Access Protocol (SOAP), web services, Representational State Transfer (REST), and JavaScript Object Notation (JSON). While all middleware performs communication functions, the type a company chooses to use will depend on what service is being used and what type of information needs to be communicated. This can include security authentication, transaction management, message queues, application servers, web servers, and directories. Middleware can also be used for distributed processing with actions occurring in real-time rather than sending data back and forth.
</p>

<h1>How to Create Custom Middleware in Laravel 11</h1>

<h2>Step 1: Install Laravel 11</h2>
<p>
First, we’ll install Laravel 11 using the following command:
</p>
<pre><code>composer create-project --prefer-dist laravel/laravel laravel-11-example</code></pre>

<h2>Step 2: Create Middleware</h2>
<p>
Now, we’ll create middleware using the following command:
</p>
<pre><code>php artisan make:middleware IsAdmin</code></pre>
<p>File path:</p>
<pre><code>app/Http/Middleware/IsAdmin.php</code></pre>

<pre><code><?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (\Auth::user()->role_id != 1) {
            return response()->json('Oops! You do not have permission to access.');
        }
        return $next($request);
    }
}

?></code></pre>

<h2>Step 3: Register Middleware</h2>
<p>
In this step, we will register our custom middleware in the <code>bootstrap/app.php</code> file, as illustrated in the code snippet below:
</p>

<pre><code><?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(_DIR_))
    ->withRouting(
        web: _DIR_.'/../routes/web.php',
        commands: _DIR_.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isAdmin' => \App\Http\Middleware\IsAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

?></code></pre>

<h2>Step 4: Apply Middleware</h2>
<p>
In this step, we’ll create two routes and apply the “isAdmin” middleware. Let’s proceed by updating the code accordingly:
</p>

<pre><code><?php

use Illuminate\Support\Facades\Route;

Route::middleware(['isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard';
    });
      
    Route::get('/users', function () {
        return 'Users';
    });
});

?></code></pre>

<h2>Step 5: Run the Laravel 11 Application</h2>
<p>
Run the Laravel 11 application using the following command:
</p>

<pre><code>php artisan serve</code></pre>
<br>

<h1>Exclude middleware from a route</h1>
<p>
You can exclude middleware at the route level in Laravel using the withoutMiddleware() method.
</p>
<pre><code>
Route::post('/some/route', SomeController::class)
    ->withoutMiddleware([VerifyCsrfToken::class]);</code></pre>

   



<h1>أنواع Middleware</h1>
<ul>
    <li><strong>Global Middleware:</strong> يُطبق على جميع الطلبات.</li>
    <li><strong>Route Middleware:</strong> يُطبق فقط على المسارات المحددة.</li>
    <li><strong>Group Middleware:</strong> يُطبق على مجموعة من المسارات.</li>
</ul>

<h1>مفهوم الـ Middleware:</h1>
<p>
الـ Middleware هو جزء من الكود يُنفّذ بين الطلبات (مثل زيارة صفحة) والاستجابات (مثل عرض الصفحة). يُستخدم لتنفيذ مهام معينة، مثل التأكد من أن المستخدم مسجل دخول قبل أن يسمح له بالوصول إلى صفحة معينة.
</p>



<h1>ملخص:</h1>
<ul>
    <li>الـ Middleware هو كود يُنفّذ بين الطلبات والاستجابات.</li>
    <li>أنشئ Middleware للتحقق من تسجيل الدخول.</li>
    <li> Middleware في تطبيقك سجل</li>
    <li>أنشئ ملف مسارات خارجي وأضف المسارات إليه.</li>
    <li>تضمين ملف المسارات في إعدادات التطبيق.</li>
    <li>اختبر المسارات للتحقق من عمل الـ Middleware.</li>
    <li>أنواعه تشمل Global و Route و Group.</li>
    <li>إنشائه يتم عبر الأمر <code>php artisan make:middleware</code>.</li>
    <li>تسجيله يكون في <code>Kernel.php</code>.</li>
    <li>تطبيقه على مسارات فردية أو مجموعات مسارات.</li>
    <li>تطبيقه عالميًا عبر مصفوفة <code>$middleware</code> في <code>Kernel.php</code>.</li>
    <li>استخدامه في المجموعات ضمن <code>middlewareGroups</code>.</li>
</ul>

</body>
</html>

 <!-- <h1>What is middleware?</h1>
<p>
Middleware is software that lies between an operating system and the applications running on it. Essentially functioning as hidden translation layer, middleware enables communication and data management for distributed applications. It’s sometimes called plumbing, as it connects two applications together so data and databases can be easily passed between the “pipe.” Using middleware allows users to perform such requests as submitting forms on a web browser, or allowing the web server to return dynamic web pages based on a user’s profile.

Common middleware examples include database middleware, application server middleware, message-oriented middleware, web middleware, and transaction-processing monitors. Each program typically provides messaging services so that different applications can communicate using messaging frameworks like simple object access protocol (SOAP), web services, representational state transfer (REST), and JavaScript object notation (JSON). While all middleware performs communication functions, the type a company chooses to use will depend on what service is being used and what type of information needs to be communicated. This can include security authentication, transaction management, message queues, applications servers, web servers, and directories. Middleware can also be used for distributed processing with actions occurring in real time rather than sending data back and forth.
</p>
<h1>How to Create Custom Middleware in Laravel 11</h1>
<h2>Step 1: Install Laravel 11</h2>
<p>

First, we’ll install laravel 11 using the following command.
<h4>
composer create-project --prefer-dist laravel/laravel 

laravel-11-example</h4>

<h2>Step 2: Create Middleware</h2>

Now, we’ll create middleware using the following command.

<h4>php artisan make:middleware IsAdmin</h4>
<h4>
app/Http/Middleware/IsAdmin.php

<?php
  
namespace App\Http\Middleware;
  
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
  
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (\Auth::user()->role_id != 1) {
            return response()->json('Opps! You do not have permission to access.');
        }
return $next($request);
    }
}</4
<h2>Step 3: Register Middleware</h2>

In this step, we will register our custom middleware in the app.php file, as illustrated in the code snippet below:
<h4>
bootstrap/app.php

<?php
   
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
   
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isAdmin' => \App\Http\Middleware\IsAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();</h4
    
<h2>Step 4: Apply Middleware</h2>

In this step, we’ll create two routes and apply the “isAdmin” middleware. Let’s proceed by updating the code accordingly.

routes/web.php
<h4>
<?php
  
use Illuminate\Support\Facades\Route;
  
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard';
    });
      
    Route::get('/users', function () {
        return 'Users';
    });
});</h4
<h2>Step 5: Run the Laravel 11 Application</h2>

Run the laravel 11 application using the following command.

<h4>php artisan serve</h4>
<br>
<h1> أنواع Middleware</h1>
Global Middleware: يُطبق على جميع الطلبات.
Route Middleware: يُطبق فقط على المسارات المحددة.
Group Middleware: يُطبق على مجموعة من المسارات.
<br>
<h1> مفهوم الـ Middleware:</h1>
<p>
الـ Middleware هو جزء من الكود يُنفّذ بين الطلبات (مثل زيارة صفحة) والاستجابات (مثل عرض الصفحة). يُستخدم لتنفيذ مهام معينة، مثل التأكد من أن المستخدم مسجل دخول قبل أن يسمح له بالوصول إلى صفحة معينة.</p>
<br>
<h1>ملخص:</h1>
<p>

الـ Middleware هو كود يُنفّذ بين الطلبات والاستجابات.1-

<h4>

أنشئ Middleware للتحقق من تسجيل الدخول.
سجل Middleware في تطبيقك.
أنشئ ملف مسارات خارجي وأضف المسارات إليه.
تضمين ملف المسارات في إعدادات التطبيق.
اختبر المسارات للتحقق من عمل الـ Middleware.</h4>
<h4>
أنواعه تشمل Global و Route و Group.2-</h4>
<h4>
إنشائه يتم عبر الأمر php artisan make:middleware.3-</h4>
<h4>
تسجيله يكون في Kernel.php.</h4>
<h4>
تطبيقه على مسارات فردية أو مجموعات مسارات.</h4>
<h4>
تطبيقه عالميًا عبر مصفوفة $middleware في Kernel.php.</h4>
<h4>
استخدامه في المجموعات ضمن middlewareGroups.</h4>
استعمال Middleware المخصص لتلبية احتياجات معينة.

</h4>
</p>

  -->