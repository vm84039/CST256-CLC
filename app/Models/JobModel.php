<?php
namespace App\Models;

class JobModel
{
    private mixed $job_ID;
    private mixed $company;
    private mixed $job_Title;
    private mixed $job_Type;
    private mixed $job_Description;
    private mixed $closing_Date;

    /**
     * @param mixed $job_ID
     * @param mixed $company
     * @param mixed $job_Title
     * @param mixed $job_Type
     * @param mixed $job_Description
     * @param mixed $closing_Date
     */
    public function __construct(mixed $job_ID, mixed $company, mixed $job_Title, mixed $job_Type, mixed $job_Description, mixed $closing_Date)
    {
        $this->job_ID = $job_ID;
        $this->company = $company;
        $this->job_Title = $job_Title;
        $this->job_Type = $job_Type;
        $this->job_Description = $job_Description;
        $this->closing_Date = $closing_Date;
    }


    /**
     * @return mixed
     */
    public function getJobID(): mixed
    {
        return $this->job_ID;
    }

    /**
     * @param mixed $job_ID
     */
    public function setJobID(mixed $job_ID): void
    {
        $this->job_ID = $job_ID;
    }

    /**
     * @return mixed
     */
    public function getCompany(): mixed
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany(mixed $company): void
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getJobTitle(): mixed
    {
        return $this->job_Title;
    }

    /**
     * @param mixed $job_Title
     */
    public function setJobTitle(mixed $job_Title): void
    {
        $this->job_Title = $job_Title;
    }

    /**
     * @return mixed
     */
    public function getJobType(): mixed
    {
        return $this->job_Type;
    }
    public function getJobTypeDesciption(): mixed
    {
        if ($this->job_Type == 1)
            return "Full-time";
        else
            return "Part-time";
    }


    /**
     * @param mixed $job_Type
     */
    public function setJobType(mixed $job_Type): void
    {
        $this->job_Type = $job_Type;
    }

    /**
     * @return mixed
     */
    public function getJobDescription(): mixed
    {
        return $this->job_Description;
    }

    /**
     * @param mixed $job_Description
     */
    public function setJobDescription(mixed $job_Description): void
    {
        $this->job_Description = $job_Description;
    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getClosingDate(): mixed
    {
        return $this->closing_Date;
    }

    /**
     * @param mixed $closing_Date
     */
    public function setClosingDate(mixed $closing_Date): void
    {
        $this->closing_Date = $closing_Date;
    }





}
