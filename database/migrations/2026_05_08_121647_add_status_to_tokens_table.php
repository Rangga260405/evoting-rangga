<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tokens', function (Blueprint $table) {

            if (!Schema::hasColumn('tokens', 'is_used')) {

                $table->boolean('is_used')->default(false);

            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tokens', function (Blueprint $table) {

            if (Schema::hasColumn('tokens', 'is_used')) {

                $table->dropColumn('is_used');

            }

        });
    }
};