<?php namespace Newway\LaravelMailer\Validators;

use Laracasts\Validation\FormValidator;
use Laracasts\Validation\FactoryInterface as ValidatorFactory;
use Config;

class Dispatch extends FormValidator
{

	/**
	 * Validation rules for page create\update
	 *
	 * @var array
	 */
	protected $rules = [
		'type' => 'required',
        'name' => 'required',
        'status' => 'integer',
    ];

}