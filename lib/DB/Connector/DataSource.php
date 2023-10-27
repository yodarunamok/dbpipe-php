<?php
namespace db\connector;

abstract class DataSource
{
    abstract public function execute();

    public function __toString()
    {
        return get_class();
    }
}