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
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->string('receiver_firstname')->nullable()->after('logo');
            $table->string('receiver_lastname')->nullable()->after('receiver_firstname');
            $table->string('receiver_country')->nullable()->after('receiver_lastname');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->dropColumn(['receiver_firstname', 'receiver_lastname', 'receiver_country']);
        });
    }
};
