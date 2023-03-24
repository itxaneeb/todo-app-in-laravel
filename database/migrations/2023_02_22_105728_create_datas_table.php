<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controller\DataController;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('datas', function (Blueprint $table) {
            $table->id();
            $table->string('StudentName');
            $table->string('guardianName');
            $table->string('mobileNumber');
            $table->string('schoolName');
            $table->string('classRollnumber');
            $table->string('address');
            $table->string('birthDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datas');
    }
};
    