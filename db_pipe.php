<?php
/**
 * Created by IntelliJ IDEA.
 * User: Chris Hansen (chris@iviking.org)
 * Date: 9/21/2017
 */
spl_autoload_register( function( $className ) {
    $file = str_replace('\\',DIRECTORY_SEPARATOR, $className);
    echo $file;
    include 'lib' . DIRECTORY_SEPARATOR . $file . '.php';
});
