<?php
namespace App\Http\Requests;use Illuminate\Foundation\Http\FormRequest;class AssignRequestRequest extends FormRequest{public function authorize():bool{return true;}public function rules():array{return ['admin_id'=>'required|exists:users,id','notes'=>'nullable|string|max:2000'];}}
