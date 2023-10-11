<?php

namespace Rahda\CptManager\Base;

class Deactivate
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}