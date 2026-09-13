<?php
namespace App\Http\Requests; use Illuminate\Foundation\Http\FormRequest;
class ApplyProviderRequest extends FormRequest { public function authorize():bool{return true;} public function rules():array{return ['category_id'=>'required|exists:provider_categories,id','bio'=>'required|string','experience_years'=>'nullable|integer|min:0|max:100','phone'=>'required|string|max:30','location'=>'required|string|max:255'];} }
