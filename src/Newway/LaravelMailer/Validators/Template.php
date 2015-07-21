<?php namespace Newway\LaravelMailer\Validators;

use Laracasts\Validation\FormValidator;
use Laracasts\Validation\FactoryInterface as ValidatorFactory;
use Config;

class Template extends FormValidator
{

	/**
	 * Validation rules for page create\update
	 *
	 * @var array
	 */
	protected $rules = [
        'name' => 'required',
        'content' => 'required',
    ];

}