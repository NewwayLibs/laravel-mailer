<?php namespace Newway\LaravelMailer\Models;

class Dispatch extends \Eloquent
{
	public $timestamps = false;

    public $table = 'mailer_dispatches';

	protected $fillable = [
		'name',
		'subject',
		'content',
		'description',
		'type',
		'status',
		'template_id',
	];

    public $types = [
        'sms',
        'email',
    ];

    const STATUS_NOT_SEND = 0;
    const STATUS_SEND = 1;

	public function template()
	{
		return $this->belongsTo('Newway\LaravelMailer\Models\Template');
	}

	public function groups()
	{
		return $this->belongsToMany('Newway\LaravelMailer\Models\Group', 'mailer_dispatches_groups', 'dispatch_id', 'group_id');
	}

	public function clients()
	{
		return $this->belongsToMany('Newway\LaravelMailer\Models\Client', 'mailer_dispatches_clients', 'dispatch_id', 'client_id');
	}
}
