<?php

namespace App\Helpers\Registry;

use Illuminate\Support\Arr;

class Registry
{

    private static $registry;

    public static function register($key, $value)
    {
        static::$registry[$key] = $value;
    }

    public static function get($key = null, $default = null)
    {
        if (!$key) {
            return static::$registry;
        }
        return Arr::get(static::$registry, $key, $default);
    }

    public function forget($keys)
    {
        Arr::forget(static::$registry, $keys);

        return $this;
    }

}
