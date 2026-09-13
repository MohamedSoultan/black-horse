<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class RegisterRequest extends FormRequest { public function authorize(): bool{return true;} public function rules():array{return ['name'=>'required|string|max:120','phone'=>'required|string|max:30|unique:users,phone','email'=>'nullable|email|max:255|unique:users,email','password'=>'required|string|min:8|regex:/[A-Za-z]/|regex:/[0-9]/|confirmed'];} }
