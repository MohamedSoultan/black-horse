<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\Factories\HasFactory;
class ProviderCategory extends Model { use HasFactory; protected $fillable=['name','description','status']; public function applications(){return $this->hasMany(ProviderApplication::class,'category_id');} public function providers(){return $this->hasMany(Provider::class,'category_id');} }
