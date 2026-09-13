<?php
namespace Database\Seeders; use Illuminate\Database\Seeder; use App\Models\ProviderCategory;
class ProviderCategorySeeder extends Seeder { public function run():void{foreach(['Trainer','Veterinarian','Stable Worker','Consultant','Other Professional'] as $name)ProviderCategory::firstOrCreate(['name'=>$name],['status'=>'ACTIVE']);} }
