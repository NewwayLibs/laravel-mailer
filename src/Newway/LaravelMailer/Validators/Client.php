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
		'email' => 'required|email|unique:mailer_clients,email',
        'name' => 'required',
    ];

    public function setId($id) {
        $this->rules['email'] .= ",id,$id";
    }

}