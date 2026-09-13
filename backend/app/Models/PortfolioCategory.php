<?php
namespace App\Models;use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\SoftDeletes;class PortfolioCategory extends Model{use SoftDeletes;protected $fillable=['name','description','status','sort_order'];public function items(){return $this->hasMany(PortfolioItem::class,'category_id');}}
