<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->char('telpon',16);
            $table->string('password');
            $table->string('alamat')->nullable();
            $table->boolean('status');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE admins ADD photo MEDIUMBLOB");

        Schema::table('admins', function (Blueprint $table) {
            $table->foreignId('bagian_id')->constrained('devisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
