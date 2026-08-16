<?php

namespace helpers;

class MailTemplate {
    public static function render(string $template, array $data = []) : string
    {
        /**
         * $data = ['name' => 'John', 'email' => 'aaa@gmail.com']
         * $data = ['order' => [name=>'John', 'email' => 'aaa@gmail.com', products => ['name_prod' => 'Avocado', 'price' => 155]]
         *
         * extract($data); - $name = 'John', $email = 'aaa@gmail.com'
         * extract($data); - $order[name] = 'John', $order[email] = 'aaa@gmail.com'
         */
        if (!empty($data)) {
            extract($data);
        }
        ob_start(); // стартуем (открываем) буфер
        require __DIR__ . '/../app/Views/mail/' . $template . '.php'; // подключаем файл шаблона письма и его сохраняем в буфер, не выводим в браузер
        return ob_get_clean();
    }
}