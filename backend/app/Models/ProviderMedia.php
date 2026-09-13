<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model; class ProviderMedia extends Model { protected $fillable=['provider_id','type','file_url','title']; public function provider(){return $this->belongsTo(Provider::class);} }
