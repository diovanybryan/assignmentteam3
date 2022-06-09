<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sewa', function (Blueprint $table) {
            $table->id();
            $table->string("id_mobil");
            $table->string("id_user");
            $table->date("tgl_mulai");
            $table->date("tgl_akhir");
            $table->string("create_by");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sewa');
    }
};
