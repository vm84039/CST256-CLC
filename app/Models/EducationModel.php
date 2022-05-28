<?php
/*CST256 Milestone 1 Version 1
Vinson Martin 5/20/2022,
User Model Method that creates a class to store user info to send
and receive from database.  */

namespace App\Models;

class EducationModel
{
    private mixed $id;
    private mixed $gradDate;
    private mixed $school;
    private mixed $type;
    private mixed $subject;

    /**
     * @param mixed $id
     * @param mixed $gradDate
     * @param mixed $school
     * @param mixed $type
     * @param mixed $subject
     */
    public function __construct(mixed $id, mixed $gradDate, mixed $school, mixed $type, mixed $subject)
    {
        $this->id = $id;
        $this->gradDate = $gradDate;
        $this->school = $school;
        $this->type = $type;
        $this->subject = $subject;
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
    public function getGradDate(): mixed
    {
        return $this->gradDate;
    }

    /**
     * @param mixed $gradDate
     */
    public function setGradDate(mixed $gradDate): void
    {
        $this->gradDate = $gradDate;
    }

    /**
     * @return mixed
     */
    public function getSchool(): mixed
    {
        return $this->school;
    }

    /**
     * @param mixed $school
     */
    public function setSchool(mixed $school): void
    {
        $this->school = $school;
    }

    /**
     * @return mixed
     */
    public function getType(): mixed
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType(mixed $type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getSubject(): mixed
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject(mixed $subject): void
    {
        $this->subject = $subject;
    }




}
