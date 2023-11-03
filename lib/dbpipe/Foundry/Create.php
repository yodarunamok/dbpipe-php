<?php
/**
 * Created by IntelliJ IDEA.
 * User: Chris Hansen (chris@iviking.org)
 * Date: 02-Dec-2022
 * Time: 4:19 PM
 */

namespace dbpipe\Foundry;

use dbpipe\Foundry\Traits\SetDataValues;

abstract class Create extends Query
{
    use SetDataValues;

    abstract public function execute();
}
