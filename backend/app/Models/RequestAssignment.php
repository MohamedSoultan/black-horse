<?php
namespace App\Models;use Illuminate\Database\Eloquent\Model;class RequestAssignment extends Model{protected $fillable=['request_id','admin_id','assigned_at','status','notes'];protected $casts=['assigned_at'=>'datetime'];public function request(){return $this->belongsTo(Request::class);}public function admin(){return $this->belongsTo(User::class,'admin_id');}}
