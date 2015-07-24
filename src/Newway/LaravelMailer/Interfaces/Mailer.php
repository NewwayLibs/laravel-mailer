<?php namespace Newway\LaravelMailer\Interfaces;

use Newway\LaravelMailer\Models\Dispatch;

interface Mailer {

    /**
     * @param Dispatch $dispatch
     * @return mixed
     */
    public function send(Dispatch $dispatch);
}