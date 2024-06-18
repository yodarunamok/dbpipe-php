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

    const ERRS_HANDLED = E_USER_ERROR | E_USER_WARNING | E_USER_NOTICE | E_USER_DEPRECATED;
    const VERSION = '0.0.1';

    protected $tableName;
    protected $config;
    protected $sourceIdentifier;
    protected $errorState = 0;

    public function __construct($tableName, $config)
    {
        // TODO: add spl_autoload_register() call as appropriate -- may or may not be here
        set_error_handler(array($this, "handleError"), self::ERRS_HANDLED);

        $this->tableName = $tableName;
        // Now let's process the configuration passed
        if (is_array($config)) {
            $this->config = $config;
        } elseif (is_string($config)) {
            $result = parse_ini_file($config, true);
            if ($result === false) {
                // TODO: is this the best way to handle this, or should we return an error to the user?
                trigger_error("Invalid config file path specified ($config)", E_USER_ERROR);
            } else {
                $this->config = $result;
            }
        } else {
            if (is_object($config)) {
                $typeString = "object of class " . get_class($config);
            } else {
                $typeString = gettype($config);
            }
            if (is_scalar($config)) {
                $valueString = "'$config'";
            } else {
                $valueString = "\n" . print_r($config, true);
            }
            trigger_error("Invalid type ($typeString) passed as configuration.\nValue: $valueString", E_USER_ERROR);
        }

        // Check for general errors that would indicate a problem
        if (strlen(trim($this->sourceIdentifier)) !== 3) {
            trigger_error("Internal db|.php error. Invalid source identifier ($this->sourceIdentifier) specified.", E_USER_ERROR);
        }
        if (!isset($this->config[$this->sourceIdentifier])) {
            trigger_error("Internal db|.php error. No settings present for current data source ($this->sourceIdentifier)", E_USER_ERROR);
        }
    }
    
    abstract public function execute();

    /**
     * Returns version information, etc.
     *
     * @return string
     */
    public function __toString()
    {
        return 'db|.php version ' . self::VERSION;
    }

    /**
     * Handles errors while running db|.php
     *
     * @param integer       $errNo      The level of the error raised
     * @param string        $errStr     The error message
     * @param string        $errFile    The filename that the error was raised in
     * @param integer       $errLine    The line number where the error was raised
     * @param array         $errContext An array of every variable that existed in the scope the error was triggered in
     * @return bool|void
     */
    static public function handleError($errNo , $errStr, $errFile, $errLine, $errContext) {
        error_log("Error $errNo ($errStr) in $errFile on line $errLine.");
        error_log(print_r($errContext, true));
        if ($errNo == E_USER_ERROR) die(E_USER_ERROR);
        // TODO: here I think it would be a good idea to check for a specific variable (and it's value) in the context
        // TODO: if relevant, we'd then set the error state of the appropriate object
        return true;
    }
}
