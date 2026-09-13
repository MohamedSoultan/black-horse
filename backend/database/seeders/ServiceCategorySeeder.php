<?php
namespace Database\Seeders;use Illuminate\Database\Seeder;use App\Models\ServiceCategory;class ServiceCategorySeeder extends Seeder{public function run():void{foreach(['Horse Training','Rehabilitation','Consulting','Horse Care','Stable Management'] as $i=>$name)ServiceCategory::firstOrCreate(['name'=>$name],['status'=>'ACTIVE','sort_order'=>$i]);}}
