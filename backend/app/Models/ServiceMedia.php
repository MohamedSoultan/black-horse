<?php
namespace App\Models;use Illuminate\Database\Eloquent\Model;class ServiceMedia extends Model{protected $fillable=['service_id','file_url','type','title'];public function service(){return $this->belongsTo(Service::class);}}
