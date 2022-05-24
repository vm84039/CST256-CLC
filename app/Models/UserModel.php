<?php
/*CST256 Milestone 1 Version 1
Vinson Martin 5/20/2022,
User Model Method that creates a class to store user info to send
and receive from database.  */

namespace App\Models;

class UserModel
{
    private mixed $id;
    private mixed $firstname;
    private mixed $lastname;
    private mixed $email;
    private mixed $username;
    private mixed $roleId;
    private mixed $roleDescription;
    private mixed $active;

    /**
     * @param mixed $id
     * @param mixed $firstname
     * @param mixed $lastname
     * @param mixed $email
     * @param mixed $username
     * @param mixed $roleId
     * @param mixed $active
     */
    public function __construct(mixed $id, mixed $firstname, mixed $lastname, mixed $email, mixed $username, mixed $roleId, mixed $active)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->username = $username;
        $this->roleId = $roleId;
        $this->active = $active;
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

    /**
     * @return mixed
     */
    public function getRoleId(): mixed
    {
        return $this->roleId;
    }

    /**
     * @param mixed $role
     */
    public function setRoleId(mixed $roleId): void
    {
        $this->roleId = $roleId;
    }

    /**
     * @return mixed
     */
    public function getRoleDescription(): mixed
    {
        if($this->roleId == 1) {return "Member";}
        if($this->roleId == 2) {return "Administration";}


        return $this->roleDescription;
    }

    /**
     * @return mixed
     */
    public function getActive(): mixed
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive(mixed $active): void
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function isActive(): bool{
        if ($this->active == 1) {
            return true;
        }
        return false;
    }






}
