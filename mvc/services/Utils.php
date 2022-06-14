<?php
class Utils
{
public function addCsrf(): string
    {
        $_SESSION['csrf'] = bin2hex(random_bytes(15));
        return $_SESSION['csrf'];
    }
}