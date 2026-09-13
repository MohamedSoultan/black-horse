<?php
namespace App\Services; use App\Models\Provider; use Illuminate\Validation\ValidationException;
class ProviderService { public function update(Provider $p,array $d):Provider {$p->update($d);return $p->fresh(['category','media']);} public function publicList($q){return Provider::where('verification_status','VERIFIED')->with(['user','category','media'])->paginate($q['limit']??20);} }
