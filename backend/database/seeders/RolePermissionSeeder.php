<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RolePermissionSeeder extends Seeder { public function run(): void { foreach (['REGISTERED_USER','PROVIDER','ADMIN','SUPER_ADMIN'] as $name) Role::firstOrCreate(['name'=>$name]); } }
