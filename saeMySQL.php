<?php

/**
 * Created by PhpStorm.
 * User: koastal
 * Date: 2016/7/14
 * Time: 15:27
 */
class saeMySQL extends mysqli
{
    function __construct()
    {
        parent::__construct("w.rdc.sae.sina.com.cn","zly2zz30zy","wiyi5limlhwyl2lz4zmimjxyi5jhyk3wxwhzywy2","app_ustclibiary",3307);
    }
}