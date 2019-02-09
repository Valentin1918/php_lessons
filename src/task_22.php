<?php
class WS {
    private static $connection;

    private final function  __construct() {
        echo __CLASS__ . " class is initialized only once\n";
    }

    public static function getConnection() {
        if(!isset(self::$connection)) {
            self::$connection = new WS();
        }
        return self::$connection;
    }
}

$ws1 = WS::getConnection();
$ws2 = WS::getConnection();

var_dump($ws1 === $ws2); // will be a reference on the same connection object

// A pattern Singleton is used, where we surely need to handle with the same object instance.
// For example we connect a web socket client/server and started tu use an interface of
// WS communication. We don't need to open other WS connections. The same time we need
// to be sure, that we emit and listen a correct connection channel, and that exactly
// current connection will be aborted at the end.
