<?php

use App\Models\Role;
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
        $member = new Role();
        $member->role = 'member';
        $member->save();

        $minInfantil = new Role();
        $minInfantil->role = 'liderMinisterio';
        $minInfantil->save();

        $pastor = new Role();
        $pastor->role = 'pastor';
        $pastor->save();

        $admin = new Role();
        $admin->role = 'admin';
        $admin->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if($role = Role::where('role', 'member')->first()) Role::destroy($role);
        if($role = Role::where('role', 'ministerioInfantil')->first()) Role::destroy($role);
        if($role = Role::where('role', 'pastor')->first()) Role::destroy($role);
        if($role = Role::where('role', 'admin')->first()) Role::destroy($role);
    }
};
