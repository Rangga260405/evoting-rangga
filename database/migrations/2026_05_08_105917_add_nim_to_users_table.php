<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nim')->nullable()->after('email');
        });

        DB::table('users')->update([
            'nim' => DB::raw("CONCAT('NIM', id)")
        ]);

        Schema::table('users', function (Blueprint $table) {
            $table->unique('nim');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['nim']);
            $table->dropColumn('nim');
        });
    }
};