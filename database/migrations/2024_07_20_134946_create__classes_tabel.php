<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
// class createSchoolclassesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('School_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('capacity');
            $table->boolean('is_fulled');
            $table->float('price');
            $table->time('time_from');
            $table->time('time_to');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('School_classes');
    }
};
