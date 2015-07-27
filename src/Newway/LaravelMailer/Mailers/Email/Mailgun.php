<?php namespace Newway\LaravelMailer\Mailers\Email;

use Newway\LaravelMailer\Interfaces\Mailer;
use Newway\LaravelMailer\Message;
use Newway\LaravelMailer\Models\Dispatch;
use Newway\LaravelMailer\Models\Client;
use Mailgun as MailgunMail;

class Mailgun implements Mailer {

    public function send(Dispatch $dispatch) {
        $clients = Client::relatedToDispatch($dispatch->id)->get();
        if($clients) {
            $emails = $clients->map(function($c) { return $c->email;})->toArray();
            $data = $clients->map(function($c) { return ['name' => $c->name, 'email' => $c->email];})->toArray();
            $variables = array_combine($emails, $data);

            $template = $dispatch->template ? $dispatch->template->content : null;
            $message = new Message($template, $dispatch->content);
            MailgunMail::send('laravel-mailer::emails.base', ['text' => $message->getMessage()], function ($message) use ($emails, $variables, $dispatch) {
                $message->subject($dispatch->subject);
                $message->to($emails);
                $message->recipientVariables($variables);
            });
        }
    }

}
