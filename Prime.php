<?php

class Prime
{
    public function IsPrime($n)
    {
        for ($x = 2; $x < $n; $x++) {
            if ($n % $x == 0) {
                return 0;
            }
        }
        return 1;
    }
}