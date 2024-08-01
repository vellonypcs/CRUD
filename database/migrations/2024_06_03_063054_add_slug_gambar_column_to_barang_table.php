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
        Schema::table('barang', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->after('gambar');
            $table->string('gambar', 255)->nullable()->after('nama_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang', function (Blueprint $table) {
            if (Schema::hasColumn('barang', 'slug')) {
                $table->dropColumn('slug');
            }

            if (Schema::hasColumn('barang', 'cover')) {
                $table->dropColumn('column');
            }
        });
    }
};
