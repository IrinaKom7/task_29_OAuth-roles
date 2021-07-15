<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\HtmlFormatter;

// Создаем логгер 
$log = new Logger('mylogger');

// Хендлер, который будет писать логи в "authlog.log" и слушать все ошибки с уровнем "WARNING" и выше .
$log->pushHandler(new StreamHandler('authlog.log', Logger::WARNING));

$log->pushHandler(new StreamHandler('authlog.log', Logger::ERROR));

