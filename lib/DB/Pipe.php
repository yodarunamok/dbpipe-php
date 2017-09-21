<?php
/**
 * Created by IntelliJ IDEA.
 * User: Chris Hansen (chris@iviking.org)
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

namespace DB;

const FMP = 'FileMakerPro';
const FMS = 'FileMakerServer';
const PGS = 'PostgreSQL';
const MYS = 'MySQL';
const ELK = 'elasticsearch';
const RDS = 'REDIS';


class Pipe
{
    const VERSION = '0.0.1';

    private $dataSource;

    public function __construct($sourceType)
    {
        $sourceType = "Connector\\{$sourceType}";
        $this->dataSource = new $sourceType;
    }

    /**
     * Returns version information.
     * 
     * @return string
     */
    public function __toString()
    {
        return 'DB|.php version ' . self::VERSION;
    }

    public function config($settingsArray)
    {
        foreach ($settingsArray as $setting => $value) {
            if (isset($this->dataSource->$setting)) {
                $this->dataSource->$setting = $value;
            } else {
                $errorMessage = "The '{$this->dataSource}' data source does not have a '{$setting}' setting.";
                trigger_error($errorMessage, E_USER_WARNING);
            }
        }
    }

    public function query($paramArray)
    {
        // TODO: Implement query method
        // TODO: determine how to handle logical operators and multiple requests
    }

    public function find()
    {
        // TODO: Implement find method
    }

    public function insert()
    {
        // TODO: Implement insert method
    }

    public function update()
    {
        // TODO: Implement update method
    }

    public function delete()
    {
        // TODO: Implement delete method
    }
}
