<?php
    class DatabaseConnection 
    {
        var $usernamer = "localhost";
        var $username = "root";
        var $password = "";
        
        public function establishConnectionn($server,$username,$password)
        {
            $conn = mysql_connect($server,$username,$password) or die("Connection failed");
            
            return $conn;            
        }
        public function execute($query)
        {
            if($this->establishConnectionn($server, $username, $password)==true)
            {
                $query = mysql_selectdb("usermangement", $conn) or die("Database selection failed");
                return $query;
            }
        }
    }

?>
