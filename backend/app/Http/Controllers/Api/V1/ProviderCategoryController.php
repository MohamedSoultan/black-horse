<?php
namespace App\Http\Controllers\Api\V1; use App\Models\ProviderCategory; use Illuminate\Http\Request;
class ProviderCategoryController extends ApiController { public function index(){return $this->success(ProviderCategory::where('status','ACTIVE')->orderBy('name')->get());} }
