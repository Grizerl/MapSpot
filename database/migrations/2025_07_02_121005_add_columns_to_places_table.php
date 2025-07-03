<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('places', function (Blueprint $table): void {
            $table->decimal('lat', 10, 7)->after('description');
            $table->decimal('lng', 10, 7)->after('lat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('places', function (Blueprint $table): void {
            $table->dropColumn('lat');
            $table->dropColumn('lng');
        });
    }
};
