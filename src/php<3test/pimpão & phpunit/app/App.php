<?php

class AppError extends Exception {}

class App
{
    public function sumInt($a, $b)
    {
        if (is_int($a) and is_int($b)) {
            return ($a + $b);
        }

        throw new AppError;
    }

    public function helloMars()
    {
       return file_get_contents('mars.txt');
    }
}
