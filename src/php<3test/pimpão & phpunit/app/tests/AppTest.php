<?php

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function test_sum_int_2_plus_2_is_4()
    {
        $app = new App();
        $this->assertEquals(4, $app->sumInt(2,2));
    }

    public function test_sum_int_2_plus_a_throw_error()
    {
        $app = new App();
        try {
            $app->sumInt(2, "a");
        } catch (Exception $e) {
            $this->assertInstanceOf(AppError::class, $e);
            return true;
        }

        $this->fail("Não foi gerada uma exceção");
    }

    public function test_mars_is_mars()
    {
        $app = new App();
        $this->assertEquals("MARTE\n",$app->helloMars());
    }

}
