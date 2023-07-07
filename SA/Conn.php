<?php

     class Conn
    {
        public string $db ="mysql"; 
        public string $host ="localhost"; 
        public string $user="root"; 
        public string $password=""; 
        public string $dbname="sa";
        public int $port=3306;
        public object $connect;

        public function connect(){
         
            try{

                $this->connect= new PDO($this->db.':host='.$this->host.';port='.$this->port.';dbname='.$this->dbname,$this->user,$this->password);
                
                return $this->connect;
            }
            catch(Exception $err){
                    echo "Tente mais tarde ou entre em contato com o administrador".$err;
            }
        }
    }
?>