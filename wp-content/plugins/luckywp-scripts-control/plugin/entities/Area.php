<?php

namespace luckywp\scriptsControl\plugin\entities;

class Area
{
    const HEAD = 1;
    const BODY_BEGIN = 2;
    const BODY_END = 3;

    /**
     * @param mixed $v
     * @return bool
     */
    public static function isValid($v)
    {
        return in_array($v, static::toValues(), true);
    }

    /**
     * @return array
     */
    public static function toValues()
    {
        return [static::HEAD, static::BODY_BEGIN, static::BODY_END];
    }
}
