<?php
namespace App\Http\Requests;class UpdatePortfolioRequest extends CreatePortfolioRequest{public function rules():array{return array_merge(parent::rules(),['category_id'=>'sometimes|exists:portfolio_categories,id','title'=>'sometimes|string|max:255','short_description'=>'sometimes|string|max:500','description'=>'sometimes|string']);}}
