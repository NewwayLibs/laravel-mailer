<?php namespace Newway\LaravelMailer\Models;

class Group extends \Eloquent
{
	public $timestamps = false;

    public $table = 'mailer_groups';

	protected $fillable = [
		'name',
	];

	public function clients()
	{
		return $this->belongsToMany('Newway\LaravelMailer\Models\Client', 'mailer_clients_groups', 'group_id', 'dispatch_id');
	}

    public function dispatches()
    {
        return $this->belongsToMany('Newway\LaravelMailer\Models\Dispatch', 'mailer_dispatches_groups', 'group_id', 'dispatch_id');
    }
}