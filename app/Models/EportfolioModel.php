<?php
namespace App\Models;

class EportfolioModel
{
    private mixed $id;
    private mixed $start;
    private mixed $end;
    private mixed $employer;
    private mixed $jobTitle;
    private mixed $jobDescription;
    private mixed $userId;
    private mixed $jobCount;

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
    public function getStart(): mixed
    {
        return $this->start;
    }

    /**
     * @param mixed $start
     */
    public function setStart(mixed $start): void
    {
        $this->start = $start;
    }

    /**
     * @return mixed
     */
    public function getEnd(): mixed
    {
        return $this->end;
    }

    /**
     * @param mixed $end
     */
    public function setEnd(mixed $end): void
    {
        $this->end = $end;
    }

    /**
     * @return mixed
     */
    public function getEmployer(): mixed
    {
        return $this->employer;
    }

    /**
     * @param mixed $employer
     */
    public function setEmployer(mixed $employer): void
    {
        $this->employer = $employer;
    }

    /**
     * @return mixed
     */
    public function getJobTitle(): mixed
    {
        return $this->jobTitle;
    }

    /**
     * @param mixed $jobTitle
     */
    public function setJobTitle(mixed $jobTitle): void
    {
        $this->jobTitle = $jobTitle;
    }

    /**
     * @return mixed
     */
    public function getJobDescription(): mixed
    {
        return $this->jobDescription;
    }

    /**
     * @param mixed $jobDescription
     */
    public function setJobDescription(mixed $jobDescription): void
    {
        $this->jobDescription = $jobDescription;
    }

    /**
     * @return mixed
     */
    public function getUserId(): mixed
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId(mixed $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getJobCount(): mixed
    {
        return $this->jobCount;
    }

    /**
     * @param mixed $jobCount
     */
    public function setJobCount(mixed $jobCount): void
    {
        $this->jobCount = $jobCount;
    }



}
