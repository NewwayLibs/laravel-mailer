<?php namespace Newway\LaravelMailer\Mailers\Sms;

use Newway\LaravelMailer\Interfaces\Mailer;
use Newway\LaravelMailer\Message;
use Newway\LaravelMailer\Models\Dispatch;
use Newway\LaravelMailer\Models\Client;
use Newway\TurboSms\TurboSms as Sender

/**
 * Class TurboSms
 * @package Newway\LaravelMailer\Mailers\Sms
 */
class TurboSms implements Mailer
{

    /**
     * @param \Newway\LaravelMailer\Models\Dispatch $dispatch
     *
     * @return mixed|void
     */
    public function send(Dispatch $dispatch)
    {
        $clients = Client::relatedToDispatch($dispatch->id)->get();

        if ($clients) {
            $template = $dispatch->template ? $dispatch->template->content : null;
            $message = new Message($template, $dispatch->content);
        
            foreach ($clients as $client) {
                Sender::send($message, $client->phone);
            }
        }
    }
}
