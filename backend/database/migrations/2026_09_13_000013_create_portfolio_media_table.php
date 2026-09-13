<?php
use Illuminate\Database\Migrations\Migration;use Illuminate\Database\Schema\Blueprint;use Illuminate\Support\Facades\Schema;
return new class extends Migration{public function up():void{Schema::create('portfolio_media',function(Blueprint $t){$t->id();$t->uuid('portfolio_id');$t->text('file_url');$t->string('type');$t->string('title')->nullable();$t->unsignedInteger('sort_order')->default(0);$t->timestamps();$t->foreign('portfolio_id')->references('id')->on('portfolio_items')->cascadeOnDelete();});}public function down():void{Schema::dropIfExists('portfolio_media');}};
