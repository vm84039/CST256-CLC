<?php
namespace App\Models;

class AffinityMemberListModel
{
    private mixed $memberId;
    private mixed $memberFirstName;
    private mixed $memberLastName;
    private mixed $memberEmail;
    private mixed $memberPhone;

    /**
     * @param mixed $memberId
     * @param mixed $memberFirstName
     * @param mixed $memberLastName
     * @param mixed $memberEmail
     * @param mixed $memberPhone
     */
    public function __construct(mixed $memberId, mixed $memberFirstName, mixed $memberLastName, mixed $memberEmail, mixed $memberPhone)
    {
        $this->memberId = $memberId;
        $this->memberFirstName = $memberFirstName;
        $this->memberLastName = $memberLastName;
        $this->memberEmail = $memberEmail;
        $this->memberPhone = $memberPhone;
    }

    /**
     * @return mixed
     */
    public function getMemberId(): mixed
    {
        return $this->memberId;
    }

    /**
     * @param mixed $memberId
     */
    public function setMemberId(mixed $memberId): void
    {
        $this->memberId = $memberId;
    }

    /**
     * @return mixed
     */
    public function getMemberFirstName(): mixed
    {
        return $this->memberFirstName;
    }

    /**
     * @param mixed $memberFirstName
     */
    public function setMemberFirstName(mixed $memberFirstName): void
    {
        $this->memberFirstName = $memberFirstName;
    }

    /**
     * @return mixed
     */
    public function getMemberLastName(): mixed
    {
        return $this->memberLastName;
    }

    /**
     * @param mixed $memberLastName
     */
    public function setMemberLastName(mixed $memberLastName): void
    {
        $this->memberLastName = $memberLastName;
    }

    /**
     * @return mixed
     */
    public function getMemberEmail(): mixed
    {
        return $this->memberEmail;
    }

    /**
     * @param mixed $memberEmail
     */
    public function setMemberEmail(mixed $memberEmail): void
    {
        $this->memberEmail = $memberEmail;
    }

    /**
     * @return mixed
     */
    public function getMemberPhone(): mixed
    {
        return $this->memberPhone;
    }

    /**
     * @param mixed $memberPhone
     */
    public function setMemberPhone(mixed $memberPhone): void
    {
        $this->memberPhone = $memberPhone;
    }


}
