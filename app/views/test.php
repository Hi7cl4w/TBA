<?php
echo gethostname();
Mail::laterOn('ticket', 5, 'emails.ticket.admin', array('key' => 'value'), function ($message) {


    $message->to("manuknarayanan@gmail.com", 'no-replay')->subject('Welcome!');
});
