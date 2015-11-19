<?php namespace Newway\LaravelMailer\Models;

class Client extends \Eloquent
{
	public $timestamps = false;

	public $table = 'mailer_clients';

	protected $fillable = [
		'name',
		'email',
		'phone'
	];

	public function groups()
	{
		return $this->belongsToMany('Newway\LaravelMailer\Models\Group', 'mailer_clients_groups', 'client_id', 'group_id');
	}

	public function dispatches()
	{
		return $this->belongsToMany('Newway\LaravelMailer\Models\Dispatch', 'mailer_dispatches_clients', 'client_id', 'dispatch_id');
	}

	public function scopeRelatedToDispatch($q, $dispatchId)
	{
        return $q->whereHas('dispatches', function ($dq) use ($dispatchId) {
            $dq->where('dispatch_id', $dispatchId);
        })->orWhere(function($q) use ($dispatchId) {
            $q->whereHas('groups', function ($gq) use ($dispatchId) {
                $gq->whereHas('dispatches', function ($dq) use ($dispatchId) {
                    $dq->where('dispatch_id', $dispatchId);
                });
            });
        });
	}
}