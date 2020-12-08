<?php
class Dbcon {
    public $conn;
    function __construct() {
        $this->conn = mysqli_connect('localhost', 'root', '', 'CedHosting');
        if(!$this->conn) {
            die("Connection failed ".$conn->connect_error);
        }
    }

}
?>