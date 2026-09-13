<?php
use Illuminate\Database\Migrations\Migration;use Illuminate\Database\Schema\Blueprint;use Illuminate\Support\Facades\Schema;
return new class extends Migration{public function up():void{Schema::create('service_categories',function(Blueprint $t){$t->id();$t->string('name')->unique();$t->text('description')->nullable();$t->string('status')->default('ACTIVE');$t->unsignedInteger('sort_order')->default(0);$t->timestamps();$t->softDeletes();});}public function down():void{Schema::dropIfExists('service_categories');}};
