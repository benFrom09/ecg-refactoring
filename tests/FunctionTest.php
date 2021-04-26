<?php

use PHPUnit\Framework\TestCase;

class FuntionTest extends TestCase
{
    
    public function test_it_should_return_false() {
        $this->assertFalse(false,'it should return false');
    }
    public function test_it_should_format_entity_method() {
        $string = 'nb_max_player';
        $str2 = 'content';

        $this->assertEquals('setNbMaxPlayer',formatEntityMethod($string));
        $this->assertEquals('setContent',formatEntityMethod($str2));
    }

}