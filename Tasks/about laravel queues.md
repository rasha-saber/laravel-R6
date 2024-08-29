 <!-- شرح لي -->
 <h1>كيفية عمل صفوف المهام في Laravel</h1>
 <br>
 
 صفوف المهام في Laravel (Queues) هي طريقة لتنفيذ بعض المهام التي تأخذ وقتًا طويلاً بشكل غير متزامن (أي في الخلفية)، مما يساعد على تحسين أداء التطبيق. بدلاً من تنفيذ المهام الطويلة مثل إرسال البريد الإلكتروني أو معالجة الملفات الكبيرة مباشرةً عند طلب المستخدم، يمكن وضعها في صف لتُنفَّذ لاحقًا، مما يسمح للمستخدم بمتابعة استخدام التطبيق دون انتظار.

<h2>كيف تعمل صفوف المهام؟</h2>
إضافة المهمة إلى الصف: عندما يكون لديك مهمة طويلة مثل إرسال بريد إلكتروني، يمكنك وضعها في صف باستخدام وظيفة dispatch(). هذا يعني أنك تقول للنظام "قم بتنفيذ هذه المهمة، لكن ليس الآن، نفذها لاحقًا."
<br>
على سبيل المثال:
SendEmail::dispatch($user);
</br>
العامل (Worker): العامل هو جزء من البرنامج يعمل في الخلفية ويقوم بتنفيذ المهام الموجودة في الصف. بمجرد أن تضيف مهمة إلى الصف، سينتظر العامل حتى يصل الوقت المناسب ليقوم بتنفيذها.
لتشغيل العامل:
php artisan queue:work

 <h2>أنواع الصفوف:</h2>
يمكنك استخدام صفوف متعددة لتنظيم المهام حسب الأولوية. على سبيل المثال، قد ترغب في وضع المهام المهمة في صف واحد والمهام الأقل أهمية في صف آخر.

<h3>مثال بسيط:</h3>
لنفترض أنك تريد إرسال رسالة بريد إلكتروني عند تسجيل مستخدم جديد. يمكنك تنفيذ هذه المهمة مباشرة، ولكن إذا كان لديك عدد كبير من المستخدمين، قد يتأخر التطبيق. الحل هو وضع هذه المهمة في صف.

<h3>إنشاء وظيفة (Job):</h3>
 أولاً، ننشئ وظيفة (Job) جديدة:
php artisan make:job SendEmail
الاختيار بين قواعد البيانات: يمكنك تخزين صفوف المهام في عدة أماكن، مثل قاعدة البيانات، Redis، أو حتى SQS من Amazon. يعتمد الاختيار على حجم التطبيق ومتطلباته.
<br>
كتابة منطق الإرسال في الوظيفة: داخل ملف الوظيفة الذي تم إنشاؤه، تضيف كود الإرسال:
public function handle()
{
    Mail::to($this->user->email)->send(new WelcomeMail($this->user));
}
<h3>إرسال الوظيفة إلى الصف</h3>

 عند تسجيل مستخدم جديد

SendEmail::dispatch($user);

<h3>فوائد استخدام صفوف المهام:</h3>
تحسين أداء التطبيق: الصفوف تمنع تعليق التطبيق عند تنفيذ مهام طويلة.
إدارة الحمل: يمكنك توزيع الحمل بين عدة خوادم لتجنب إرهاق خادم واحد.
المرونة: يمكنك التحكم في الأولويات وجدولة المهام بسهولة.


<h2>باختصار، صفوف المهام في Laravel تساعدك على إدارة المهام الطويلة بشكل أكثر كفاءة، مما يجعل تجربة المستخدم أفضل وأسرع

</h2>
 <h1>laravel queues</h1>
 <h3>
1-Introduction to Queues & Jobs</h3>
 <h3>2-Queue Workers </h3>
 <h3>3-Job Dispatching </h3>
 <h3>4-Handling Failed Jobs</h3>
 <h3>5-Task Scheduling with Laravel Scheduler</h3>
 <h3>6-Conclusion</h3>

<h2>1. Introduction to Queues & Jobs</h2>
Queues allow you to defer the processing of time-consuming tasks, improving the performance and responsiveness of your application. Laravel 11 supports various queue backends, including Redis, Amazon SQS, Beanstalkd, and database.

<h2>2. Queue Workers</h2>
Queue workers process jobs pushed onto the queue. To run a queue worker, use the queue:work Artisan command.

Example: Running a Queue Worker

php artisan queue:work

You can also specify the connection and queue:

php artisan queue:work redis --queue=default

<h2>3. Job Dispatching</h2>
Jobs represent a unit of work that can be dispatched onto the queue. To create a job, use the Artisan command:

php artisan make:job SendEmailJob
This will generate a job class in app/Jobs/SendEmailJob.php.

Example: Defining a Job

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email;
    public function __construct($email)
    {
        $this->email = $email;
    }
    public function handle()
    {
        Mail::to($this->email)->send(new \App\Mail\NotificationEmail());
    }
}

Example: Dispatching a Job
use App\Jobs\SendEmailJob;

Route::get('/send-email', function () {

    SendEmailJob::dispatch('user@example.com');

    return 'Email sent!';

});

<h2>4. Handling Failed Jobs</h2>
Laravel provides a mechanism to handle failed jobs, storing them in a failed_jobs database table.

Example: Setting Up Failed Jobs
Create the failed_jobs table:
php artisan queue:failed-table
php artisan migrate

Configure failed job services in config/queue.php:
'failed' => [
    'database' => env('DB_CONNECTION', 'mysql'),
    'table' => 'failed_jobs', 
],

Retrying Failed Jobs:
php artisan queue:retry all
php artisan queue:retry {job_id}

<h2>5. Task Scheduling with Laravel Scheduler</h2>
The Laravel Scheduler allows you to define your scheduled tasks in a single location.

Example: Setting Up the Scheduler
Define scheduled tasks in app/Console/Kernel.php:

protected function schedule(Schedule $schedule)
{
    $schedule->command('inspire')->hourly();
}
Example: Scheduling a Closure

protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        \Log::info('This is a scheduled task!');
    })->daily();
}
Example: Scheduling a Command

protected function schedule(Schedule $schedule)
{
    $schedule->command('emails:send')->dailyAt('13:00');
}
Example: Scheduling a Job
use App\Jobs\SendEmailJob;

protected function schedule(Schedule $schedule)
{
    $schedule->job(new SendEmailJob('user@example.com'))->daily();
}
Example: Setting Up Cron Jobs
Add the following Cron entry to your server to run the scheduler every minute:
php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1

<h2>6. Conclusion</h2>
Laravel 11’s queue and task scheduling features provide a robust framework for handling background tasks and periodic operations. By utilizing queues, jobs, and the Laravel Scheduler, you can significantly enhance your application’s performance and maintainability.

