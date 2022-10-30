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
       //Creating users table :
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("email", 100)->unique();
            $table->char('name', 50)->unique();
            $table->boolean('is_admin')->default(0);
            $table->string('password', 100);
            $table->timestamps();
            $table->rememberToken();
                  
        });

          $data=[[
            'name'=>'admin',
            'password'=>bcrypt('admin'),
            'email'=>"admin@admin.com",
            'is_admin'=>1
          ]];
          DB::table('users')->insert($data);
       
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        
    }
};
