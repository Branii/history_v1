<?php 
 
 class Config  {

     private $user ="root";
     private $pass = "root";
     private $base = "mysql:host=localhost;dbname=history";

     public function getUser() {
         return $this->user;
     }

     public function getPass() {
         return $this->pass;
     }

     public function getBase() {
         return $this->base;
     }

 }


?>