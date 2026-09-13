<?php
use Illuminate\Database\Migrations\Migration;use Illuminate\Database\Schema\Blueprint;use Illuminate\Support\Facades\Schema;
return new class extends Migration{public function up():void{Schema::create('service_media',function(Blueprint $t){$t->id();$t->uuid('service_id');$t->text('file_url');$t->string('type');$t->string('title')->nullable();$t->timestamps();$t->foreign('service_id')->references('id')->on('services')->cascadeOnDelete();});}public function down():void{Schema::dropIfExists('service_media');}};
