<?php
namespace Database\Factories;
use App\Models\User; use Illuminate\Database\Eloquent\Factories\Factory;
class UserFactory extends Factory { protected $model = User::class; public function definition(): array { return ['name'=>fake()->name(), 'phone'=>fake()->unique()->e164PhoneNumber(), 'email'=>fake()->unique()->safeEmail(), 'password_hash'=>'not-set', 'status'=>'PENDING_VERIFICATION']; } }
