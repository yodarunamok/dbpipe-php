<?php
/**
 * Created by IntelliJ IDEA.
 * User: Chris Hansen (chris@iviking.org)
 * Date: 01-Dec-2022
 * Time: 2:25 PM
 */

namespace dbpipe\Foundry;

use dbpipe\Foundry\Traits\QueryParts;

abstract class Query
{
    use QueryParts;

    protected $tableName;
    protected $config;
    protected $sourceIdentifier;
    protected $errorState = 0;

    public function __construct($tableName, $config)
    {
        $this->tableName = $tableName;
        $this->config = $config;
        if (strlen(trim($this->sourceIdentifier)) !== 3) {
            trigger_error("Internal db|.php error. Invalid source identifier ($this->sourceIdentifier) specified.", E_USER_ERROR);
        }
    }
    
    abstract public function execute();
}
