<?php
namespace Tests\Feature;
use Tests\TestCase; use Illuminate\Foundation\Testing\RefreshDatabase; use App\Models\{User,Role}; use Illuminate\Support\Facades\Hash;
class AuthenticationTest extends TestCase { use RefreshDatabase;
 protected function setUp():void { parent::setUp(); $this->artisan('migrate'); Role::create(['name'=>'REGISTERED_USER']); }
 public function test_register_success():void{$r=$this->postJson('/api/v1/auth/register',['name'=>'Test','phone'=>'+201000000001','password'=>'Password1','password_confirmation'=>'Password1']);$r->assertOk()->assertJsonPath('data.user.status','PENDING_VERIFICATION');$this->assertDatabaseHas('users',['phone'=>'+201000000001']);}
 public function test_register_validation():void{$this->postJson('/api/v1/auth/register',['name'=>'Test','password'=>'x'])->assertStatus(422)->assertJsonValidationErrors(['phone','password']);}
 public function test_login_success():void{$u=User::create(['id'=>(string)\Illuminate\Support\Str::uuid(),'name'=>'A','phone'=>'+201000000002','password_hash'=>Hash::make('Password1'),'status'=>'ACTIVE']);$u->roles()->attach(Role::first());$this->postJson('/api/v1/auth/login',['phone'=>$u->phone,'password'=>'Password1'])->assertOk()->assertJsonStructure(['data'=>['access_token','refresh_token']]);}
 public function test_invalid_login():void{$this->postJson('/api/v1/auth/login',['phone'=>'+201000000099','password'=>'bad'])->assertStatus(422);}
 public function test_protected_route_requires_token():void{$this->getJson('/api/v1/me')->assertUnauthorized();}
 public function test_refresh_token():void{$u=User::create(['id'=>(string)\Illuminate\Support\Str::uuid(),'name'=>'A','phone'=>'+201000000003','password_hash'=>Hash::make('Password1'),'status'=>'ACTIVE']);$u->roles()->attach(Role::first());$login=$this->postJson('/api/v1/auth/login',['phone'=>$u->phone,'password'=>'Password1'])->json('data');$this->postJson('/api/v1/auth/refresh',['refresh_token'=>$login['refresh_token']])->assertOk()->assertJsonStructure(['data'=>['access_token']]);}
}
