<?php


namespace DB;


abstract class Query
{
    private $pipe;
    protected $tableName;
    protected $sourceIdentifier;
    protected $parts = [];
    protected $errorState = 0;

    public function __construct($tableName, $config=false, $sourceIdentifier=false)
    {
        $this->tableName = $tableName;
        $this->sourceIdentifier = $sourceIdentifier;
        // if we were passed something in the way of configuration, manage that first
        if ($config !== false) {
            $this->configure($config);
        } elseif (defined("DBPIPE_CONFIG")) {
            $this->configure(DBPIPE_CONFIG);
        } else {
            // TODO: we have no configuration, so this should be an error
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

    private function configure($config) {
        // TODO: handle both strings and arrays (files vs. raw config settings)
        // TODO: rework this
        if (!isset($this->pipe) || !($this->pipe instanceof Pipe)) {
            $this->pipe = new Pipe($config);
        }
    }
}
