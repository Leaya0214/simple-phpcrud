<?php
class connection{
    public $hostName = "localhost";
    public $userName = "root";
    public $passName = "";
    public $dbName = "batch03";

    public $con = new mysqli($hostName,$userName,$passName,$dbName);

}
?>
