<?php
/*CST256 Milestone 1 Version 1
Vinson Martin 5/20/2022,
User Model Method that creates a class to store user info to send
and receive from database.  */

namespace App\Models;

class ProfileModel
{
    private mixed $id = 0;
    private mixed $address = "Address";
    private mixed $city = "Phoenix";
    private mixed $state = "AZ";
    private mixed $zip = "85041";
    private mixed $phone = "6025551212";
    private mixed $dob = "01011900";

    /**
     * @param int|mixed $id
     * @param mixed|string $address
     * @param mixed|string $city
     * @param mixed|string $state
     * @param mixed|string $zip
     * @param mixed|string $phone
     * @param mixed|string $dob
     */


    /**
     * @return mixed
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAddress(): mixed
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress(mixed $address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCity(): mixed
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity(mixed $city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getState(): mixed
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState(mixed $state): void
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getZip(): mixed
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     */
    public function setZip(mixed $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function getPhone(): mixed
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone(mixed $phone): void
    {
        $this->phone = $phone;
    }
    public function displayPhone(): string
    {
        $cleaned = preg_replace('/[^[:digit:]]/', '', $this->phone);
        preg_match('/(\d{3})(\d{3})(\d{4})/', $cleaned, $matches);
        return "({$matches[1]}) {$matches[2]}-{$matches[3]}";
    }

    /**
     * @return mixed
     */
    public function getDob(): mixed
    {
        return $this->dob;
    }

    /**
     * @param mixed $dob
     */
    public function setDob(mixed $dob): void
    {
        $this->dob = $dob;
    }


}
