<?php

namespace Meness\Verifi\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Class VerifyEmailNotification
 * @package Meness\Verifi\Notifications
 */
class VerifyEmailNotification extends Notification implements ShouldQueue {

    use Queueable;

    /**
     * @var integer
     */
    public $expiration;
    /**
     * @var string
     */
    public $token;

    /**
     * VerificationSent constructor.
     *
     * @param $token
     * @param $expiration
     */
    public function __construct($token, $expiration) {

        $this->token      = $token;
        $this->expiration = $expiration;
    }

    /**
     * @param \Illuminate\Notifications\Notifiable|\Meness\Verifi\Entities\Traits\Contracts\Verifi $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {

        $email       = $notifiable->getEmailForEmailVerify();
        $verifyRoute = config('verifi.verify_route');
        $link        = url("{$verifyRoute}?email={$email}&expiration={$this->expiration}&token={$this->token}");

        return (new MailMessage)->line('Thank you for signing up with us!')->line('You\'re almost done! Please click here to complete your registration:')->action('Complete Registration', $link);
    }

    /**
     * @return array
     * @internal param $notifiable
     */
    public function via() {

        return ['mail'];
    }
}