<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('roles', fn (Blueprint $t) => [$t->id(), $t->string('name')->unique(), $t->timestamps()]);
        Schema::create('permissions', fn (Blueprint $t) => [$t->id(), $t->string('key')->unique(), $t->string('description')->nullable(), $t->timestamps()]);
        Schema::create('role_permissions', function (Blueprint $t) { $t->foreignId('role_id')->constrained()->cascadeOnDelete(); $t->foreignId('permission_id')->constrained()->cascadeOnDelete(); $t->primary(['role_id','permission_id']); });
        Schema::create('user_roles', function (Blueprint $t) { $t->uuid('user_id'); $t->foreign('user_id')->references('id')->on('users')->cascadeOnDelete(); $t->foreignId('role_id')->constrained()->cascadeOnDelete(); $t->timestamp('granted_at')->useCurrent(); $t->timestamps(); $t->primary(['user_id','role_id']); });
    }
    public function down(): void { Schema::dropIfExists('user_roles'); Schema::dropIfExists('role_permissions'); Schema::dropIfExists('permissions'); Schema::dropIfExists('roles'); }
};
