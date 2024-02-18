<?php

use App\Models\Role;
use App\Models\User;
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
        $admin = User::where('name', 'admin')->first();
        $roles = Role::all();

        $admin->roles()->saveMany($roles);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
