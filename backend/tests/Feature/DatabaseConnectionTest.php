<?php
namespace Tests\Feature;
use Tests\TestCase; use Illuminate\Support\Facades\DB;
class DatabaseConnectionTest extends TestCase { public function test_database_connection_is_available(): void { $this->assertNotEmpty(DB::connection()->getPdo()); } }
