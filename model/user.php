<?php

class User {
    public $id;
    public string $name;
    public string $username;
    public string $email;
    public Address $address;

    public function __construct($data = []) {
        $data = (array)$data;
        $this->id = $data["id"] ? $data["id"] : 1;
        $this->name = $data["name"];
        $this->username = $data["username"];
        $this->email = $data["email"];

        $this->address = new Address($data["address"]);
    }
   
}

class Address {
    public string $street;
    public string $suite;
    public string $city;
    public string $zipcode;
    public Geo $geo;

    public function __construct($data = []) {
        $data = (array)$data;
        $this->street = $data["street"];
        $this->suite = $data["suite"];
        $this->city = $data["city"];
        $this->zipcode = $data["zipcode"];
        $this->geo = new Geo($data["geo"]);
    }
}

class Geo {
    public string $lat;
    public string $lng;

    public function __construct($data = []) {
        $data = (array)$data;
        $this->lat = $data["lat"];
        $this->lng = $data["lng"];
    }
}