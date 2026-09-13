<?php
namespace App\Http\Requests;class UpdateServiceRequest extends CreateServiceRequest{public function rules():array{return array_merge(parent::rules(),['category_id'=>'sometimes|exists:service_categories,id','title'=>'sometimes|string|max:255','short_description'=>'sometimes|string|max:500','description'=>'sometimes|string']);}}
