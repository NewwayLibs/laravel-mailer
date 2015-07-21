<?php namespace Newway\LaravelMailer\Validators;

use Laracasts\Validation\FormValidator;
use Config;

class Client extends FormValidator
{

	/**
	 * Validation rules for page create\update
	 *
	 * @var array
	 */
	protected $rules = [
		'email' => 'required|email',
        'name' => 'required',
    ];

}