<?php
namespace App\Models;

class UserModel
{
    private mixed $id;
    private mixed $firstname;
    private mixed $lastname;
    private mixed $email;
    private mixed $username;

    /**
     * @param mixed $id
     * @param mixed $firstname
     * @param mixed $lastname
     * @param mixed $email
     * @param mixed $username
     */
    public function __construct(mixed $id, mixed $firstname, mixed $lastname, mixed $email, mixed $username)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->username = $username;
    }

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
    public function getFirstname(): mixed
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname(mixed $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname(): mixed
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname(mixed $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getEmail(): mixed
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail(mixed $email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUsername(): mixed
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername(mixed $username): void
    {
        $this->username = $username;
    }





}
