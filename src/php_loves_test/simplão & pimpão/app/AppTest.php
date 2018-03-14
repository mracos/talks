<?php

require_once('App.php');

class TestError extends Exception {}

class TestApp 
{
    public function setUp()
    {
        $this->app = new App();
        return $this;
    }

    public function testSumInt()
    {
        echo "Testando sumInt\n";
        $esperado = 3;
        $resultado = $this->app->sumInt(1, 2);
        if ($esperado != $resultado)
            throw new TestError;
        echo "Sumint passou\n";
        return $this;
    }

    public function testHelloMars()
    {
        echo "Testando hello mars\n";
        $esperado = "hello mars";
        $resultado = $this->app->helloMars();
        if (assert("$esperado == $resultado")) {
            echo "helloMars passou\n";
            return $this;
        }
        throw new TestError;
    }
}

$test = new TestApp();
$test->setUp()
    ->testSumInt()
    ->testHelloMars()
    ;
