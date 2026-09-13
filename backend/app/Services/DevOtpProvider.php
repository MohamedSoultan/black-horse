<?php
namespace App\Services;
use Illuminate\Support\Facades\Log;
class DevOtpProvider implements OtpProvider { public function send(string $phone, string $code): void { Log::info('development_otp', ['phone'=>$phone,'code'=>$code]); } }
