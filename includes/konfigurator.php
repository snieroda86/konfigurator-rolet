<?php 
class SN_KFG{
	 protected static $instance;
    // Singleton 
    public static function instance()
    {
        if ( is_null(self::$instance) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
       
    }
}