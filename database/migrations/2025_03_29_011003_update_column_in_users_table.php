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
        Schema::table('users', function (Blueprint $table) {
            // Colonnes pour le rôle et les informations utilisateur
            $table->enum('role', ['user', 'admin'])->default('user')->after('email');
            $table->string('first_name')->nullable()->after('role');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('phone')->nullable()->after('last_name');
            $table->string('address')->nullable()->after('phone');
            $table->string('postal_code', 10)->nullable()->after('address');
            $table->string('city')->nullable()->after('postal_code');
            $table->string('country')->default('France')->after('city');
            $table->enum('client_type', ['private', 'pro'])->default('private')->after('country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role', 'first_name', 'last_name', 'phone',
                'address', 'postal_code', 'city', 'country', 'client_type'
            ]);
        });
    }
};
