<?php


namespace DB;


class Query
{
    private $pipe;

    public function __construct()
    {
        if (!isset($this->pipe) || !($this->pipe instanceof Pipe)) {
            $this->pipe = new Pipe();
        }
    }

    public function where()
    {
        // TODO: this is where much of the magic happens
    }

    public function execute()
    {
        // TODO: execute the query!
    }
}
