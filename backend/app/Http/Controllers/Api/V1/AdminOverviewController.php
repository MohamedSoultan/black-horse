<?php
namespace App\Http\Controllers\Api\V1;
use App\Models\{User,Provider,ProviderApplication,Service,Request as LeadRequest};use Illuminate\Http\Request;
class AdminOverviewController extends ApiController{
 public function dashboard(Request $r){$this->admin($r);return $this->success(['users'=>User::count(),'providers'=>Provider::count(),'pending_applications'=>ProviderApplication::where('status','PENDING')->count(),'services'=>Service::count(),'requests'=>LeadRequest::count()]);}
 public function users(Request $r){$this->admin($r);$q=User::with('roles')->latest();if($s=$r->query('search'))$q->where(fn($w)=>$w->where('name','like','%'.$s.'%')->orWhere('phone','like','%'.$s.'%'));$page=$q->paginate(min((int)$r->query('limit',20),50));return $this->success($page);}
 public function providers(Request $r){$this->admin($r);$q=Provider::where('verification_status','VERIFIED')->with(['user','category'])->withCount('media')->latest();return $this->success($q->paginate(min((int)$r->query('limit',20),50)));}
 private function admin(Request $r):void{abort_unless($r->user()->roles()->whereIn('name',['ADMIN','SUPER_ADMIN'])->exists(),403);}
}
