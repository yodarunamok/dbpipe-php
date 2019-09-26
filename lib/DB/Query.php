<?php


namespace DB;


abstract class Query
{
    private $pipe;
    private $parts = [];
    private $errorState = 0;

    public function __construct($config)
    {
        if (!isset($this->pipe) || !($this->pipe instanceof Pipe)) {
            $this->pipe = new Pipe($config);
        }
    }

    public function &where($identifier)
    {
        // TODO: this is where much of the magic happens
        $tempPart = new Query\Part($identifier);
        $this->parts[] = $tempPart;
        return $tempPart;
    }

    abstract public function execute();
}
