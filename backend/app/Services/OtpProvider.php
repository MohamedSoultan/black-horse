<?php
namespace App\Services;
interface OtpProvider { public function send(string $phone, string $code): void; }
