<?php
namespace App\Services;use App\Models\{Notification,User};
class NotificationService{public function create(User|string $user,string $type,string $title,string $message,?array $data=null):Notification{$id=$user instanceof User?$user->id:$user;return Notification::create(['user_id'=>$id,'type'=>$type,'title'=>$title,'message'=>$message,'data'=>$data]);}public function markRead(Notification $n):Notification{$n->update(['read_at'=>now()]);return $n->fresh();}public function unreadCount(User $u):int{return Notification::where('user_id',$u->id)->whereNull('read_at')->count();}}
