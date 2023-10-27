<?php
/**
 * Created by IntelliJ IDEA.
 * User: Chris Hansen (chris@iviking.org)
 * User: Gjermund G Thorsen( !ghuser TyrfingMjolnir )
 * Date: 9/13/17
 *
 * Copyright 2017 Chris Hansen
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace dbpipe;

class Config
{
    const VERSION = '0.0.1';
    const ERRS_HANDLED = E_USER_ERROR | E_USER_WARNING | E_USER_NOTICE | E_USER_DEPRECATED;

    private $fittings;

    /**
     * @param array|string  $config     Either the path to an .ini config file, or a properly formatted array
     */
    public function __construct($config)
    {
        // TODO: add spl_autoload_register() call as appropriate -- may or may not be here
        set_error_handler(array('dbpipe\Config', "handleError"), self::ERRS_HANDLED);
        if (is_array($config)) {
            $this->fittings = $config;
        } elseif (is_string($config)) {
            $result = parse_ini_file($config, true);
            if ($result === false) {
                trigger_error("Invalid config file path specified ($config)", E_USER_ERROR);
            } else {
                $this->fittings = $result;
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
    }

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
     * Intended to be using by queries to retrieve the configuration data needed to connect to a given data source
     * @param string        $dbCode     A three letter code representing a data source
     * @return mixed|void
     */
    public function getFitting($dbCode)
    {
        if (isset($this->fittings[$dbCode])) {
            return $this->fittings[$dbCode];
        }
        trigger_error("Invalid data source code ($dbCode) specified", E_USER_ERROR);
    }

    /**
     * Static method for returning a db| Config object
     * 
     * @param string|array  $config     Either the path to an .ini config file, or a properly formatted array
     * @return Config
     */
    static public function load($config)
    {
        return new Config($config);
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

    // Private Methods

    private function currentToken()
    {
        // TODO: Implement temporary storage for timestamp and current token
    }
}
