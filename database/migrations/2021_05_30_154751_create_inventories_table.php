<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('harga');
            $table->char('stok',100);
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::table('inventories', function (Blueprint $table) {
            $table->foreignId('types_id')->constrained('types');
            $table->foreignId('units_id')->constrained('units');
        });

        DB::statement("ALTER TABLE inventories ADD photo1 MEDIUMBLOB");
        DB::statement("ALTER TABLE inventories ADD photo2 MEDIUMBLOB");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
