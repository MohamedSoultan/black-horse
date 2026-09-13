<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { Schema::create('provider_media', function(Blueprint $t){$t->id();$t->uuid('provider_id');$t->string('type');$t->text('file_url');$t->string('title')->nullable();$t->timestamps();$t->foreign('provider_id')->references('id')->on('providers')->cascadeOnDelete();}); } public function down(): void {Schema::dropIfExists('provider_media');} };
