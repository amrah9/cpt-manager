<?php

namespace Rahda\CptManager\Base;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();

        if( !get_option( 'cpt_manager_options' ) )
        {
            update_option( 'cpt_manager_options', serialize( array() ) );
        }
    }
}