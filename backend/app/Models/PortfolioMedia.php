<?php
namespace App\Models;use Illuminate\Database\Eloquent\Model;class PortfolioMedia extends Model{protected $fillable=['portfolio_id','file_url','type','title','sort_order'];public function portfolio(){return $this->belongsTo(PortfolioItem::class,'portfolio_id');}}
