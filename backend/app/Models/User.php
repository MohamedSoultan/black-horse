<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, SoftDeletes;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['name', 'phone', 'email', 'password_hash', 'status'];
    protected $hidden = ['password_hash'];
    protected static function booted(): void { static::creating(function (self $user) { $user->id ??= (string) \Illuminate\Support\Str::uuid(); }); }
    public function roles() { return $this->belongsToMany(Role::class, 'user_roles')->withTimestamps(); }
    public function getJWTIdentifier() { return $this->getKey(); }
    public function getJWTCustomClaims(): array { return ['roles' => $this->roles()->pluck('name')->values()->all()]; }
}
