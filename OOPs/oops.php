<?php

    class Person{
        private $name;
        private $email;
        private static $agelimit = 80;

        public function __construct($name, $email){
            $this->name = $name;
            $this->email = $email;
            echo 'New Person born '.'<br>';
        }

        public static function getAgelimit(){
            return self::$agelimit;
        }

        public function getName(){
            return $this->name;
        }

        public function getemail(){
            return $this->email;
        }
    }

    $person1 = new Person("subhra", "subhrapaladhi9gmail.com");
    echo $person1->getAgelimit();
    echo Person::getAgelimit();

    class Customer extends Person{
        private $balance;

        public function __construct($name, $email, $balance){
            parent::__construct($name, $email, $balance);
            $this->balance = $balance;
        }

        public function getBalance(){
            return $this->balance;
        }
    }

    $cus1 = new Customer('subhra', "exp@gmail.com", 300);
    echo $cus->getName();
    echo $cus->getBalance();
    echo 'sdfsd00';

?>