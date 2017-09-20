<?php
/**
 * Created by IntelliJ IDEA.
 * User: Chris Hansen (chris@iviking.org)
 * Date: 9/16/17
 * Time: 6:24 PM
 */

namespace DB;


abstract class DataSource
{
    abstract public function execute();

    public function __toString()
    {
        return get_class();
    }
}