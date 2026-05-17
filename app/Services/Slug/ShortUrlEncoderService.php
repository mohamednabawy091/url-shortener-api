<?php

namespace App\Services\Slug;


class ShortUrlEncoderService 
{
    private string $chars;

    public function __construct()
    {
        $this->chars = implode('', array_merge(
            range('0', '9'),
            range('a', 'z'),
            range('A', 'Z'),
        ));
    }

    public function encode(int $num):string

    {
        $base = 62;

        $result = '';

        while($num > 0){
            $result = $this->chars[$num % $base] . $result;

            $num = intdiv($num, $base);
        }

        return $result ?: '0';
    }
    
}