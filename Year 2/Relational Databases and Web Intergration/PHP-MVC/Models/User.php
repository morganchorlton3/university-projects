<?php
/**
 * Created by PhpStorm.
 * User: morga
 * Date: 27/04/2019
 * Time: 15:53
 */

class User {

    private $userId, $username, $password, $name, $phoneNumber, $street, $city, $postcode;

    public function getUsername() {
        return $this->username;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function getStreet() {
        return $this->street;
    }

    public function getCity() {
        return $this->city;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setUserId($name) {
        $this->userId = $name;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function setStreet($street) {
        $this->street = $street;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

    public function __construct($userId, $username, $password, $name, $phoneNumber, $street, $city, $postcode) {
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
        $this->street = $street;
        $this->city = $city;
        $this->postcode = $postcode;
    }

}
