<?php

namespace App\Utils;

class StringHelper
{
    public static $standardKeyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * @param int $length      How many characters do we want?
     * @param string $keyspace A string of all possible characters
     *                         to select from
     * @return string
     */
    public static function randomStr($length, $keyspace = null) : string
    {
        if (!$keyspace) {
            $keyspace = self::$standardKeyspace;
        }

        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;

        for ($i = 0; $i < $length; ++$i) {
            try {
                $random = random_int(0, $max);
            } catch (\Exception $e) {
                $random = mt_rand(0, $max);
            }

            $pieces[] = $keyspace[$random];
        }

        return implode('', $pieces);
    }
}