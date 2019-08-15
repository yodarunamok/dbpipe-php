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

namespace DB;

class Pipe
{
    const VERSION = '0.0.1';

    private $dataSource;

    public function __construct($sourceType)
    {
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
        // TODO: Implement validation of timestamp; and unset() when invalid to enforce renewal of login.
        // TODO: Implement query method
        // TODO: determine how to handle logical operators and multiple requests
    }

    // CRUOUx implementation below; Create, Read, Update, Overwrite, Update mark for deletion.

    private function currentToken(){
        // TODO: Implement temporary storage for timestamp and current token
    }

    public function create() // insert payload
    {
        // TODO: Implement insert method
    }

    public function read() // find resource at id or at random
    {
        // TODO: Implement find method
    }

    public function update()
    {
        // TODO: This should just be an alias (with a more newby friednly name) of (most likely) patch
    }

    public function patch() // overwrite value for key at ID according to payload
    {
        // TODO: Implement update/patch method
    }

    public function put() // overwrite resource at ID using payload, the tricky part here is that all keys not in payload will be emptied.
    {
        // TODO: Implement update/put method
    }

    public function delete() // delete resource at ID
    {
        // TODO: Implement delete method
    }
}
