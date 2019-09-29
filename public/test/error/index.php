<?php

define('DEBUG', 1);

class NotFoundExeption extends Exception
{
    function __construct($message = "", $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code);
    }
}

class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this, 'exeptionHandler']);
    }

    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$errstr} Файл: {$errfile} Строка: {$errline} \n ===================\n", 3, __DIR__ . 'errors.log');
        $this->displayError($errno, $errstr, $errfile, $errline);
        return;
    }

    public function fatalErrorHandler()
    {
        $error = error_get_last();
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$error['message']} Файл: {$error['file']} Строка: {$error['line']} \n ===================\n", 3, __DIR__ . 'errors.log');
        if(!empty($error) AND $error['type'] & ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        } else {
            ob_end_flush();
        }
    }

    public function exeptionHandler(Exeption $e) {
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$e->getMessage()} Файл: {$e->getFile()} Строка: {$e->getLine()} \n ===================\n", 3, __DIR__ . 'errors.log');
        $this->displayError('Exeption', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500)
    {
        http_response_code($response);
        if (DEBUG) {
            require 'views/dev.php';
        } else {
            require 'views/prod.php';
        }
        exit;
    }
}