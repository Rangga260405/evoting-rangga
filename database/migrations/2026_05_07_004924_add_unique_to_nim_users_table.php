<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // TAMBAH KOLOM NIM DULU
        Schema::table('users', function (Blueprint $table) {

            $table->string('nim')
                ->nullable()
                ->after('name');

        });

        // ISI DATA NIM OTOMATIS
        DB::statement("
            UPDATE users
            SET nim = CONCAT('NIM', id)
            WHERE nim IS NULL OR nim = ''
        ");

        // BARU BUAT UNIQUE
        Schema::table('users', function (Blueprint $table) {

            $table->unique('nim');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropUnique(['nim']);

            $table->dropColumn('nim');

        });
    }
};