<?php namespace Newway\LaravelMailer\Models;

class Template extends \Eloquent
{
	public $timestamps = false;

    public $table = 'mailer_templates';

	protected $fillable = [
		'name',
		'content',
	];
}