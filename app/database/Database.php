<?php 

    class Database extends Config{
        private $con;
        public function openlink() : PDO {

            return $this->con = new PDO(
                self::getBase(),
                self::getUser(),
                self::getPass()
            );

        }

        public function closelink() : Null{
            return $this->con = null;
        }
    }