<?php
namespace App\Http\Requests; use Illuminate\Foundation\Http\FormRequest;
class ReviewProviderApplicationRequest extends FormRequest { public function authorize():bool{return true;} public function rules():array{return ['reason'=>'required_if:action,reject|string|max:2000'];} }
