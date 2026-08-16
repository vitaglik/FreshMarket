<?php

namespace app\Service;

class MailService {

    private string $from;

    public function __construct()
    {
        $this->from = 'my-shop@mvc.loc';
    }

    public function send(string $to, string $subject, string $message): bool
    {
        $headers = [
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=utf-8',
            'From: MVC SHOP ' . $this->from,
        ];

        return mail($to, $subject, $message, implode($headers));
    }
}