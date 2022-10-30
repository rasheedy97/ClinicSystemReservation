<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creating specialties table :       
        Schema::create('specialties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });
       $data = [
        ['name'=>'General practice'],
        ['name'=>'Pediatrics'],
        ['name'=>'Radiology'],
        ['name'=>'Opthalmology'],
        ['name'=>'Sports medicine'],
        ['name'=>'Rehabiliation'],
        ['name'=>'Oncology'],
        ['name'=>'Dermatology'],
        ['name'=>'Emergency Medicine']
          ];
        DB::table('specialties')->insert($data); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialties');
    }
};
