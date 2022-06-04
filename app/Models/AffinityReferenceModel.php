<?php
namespace App\Models;

class AffinityReferenceModel
{
    private mixed $id;
    private mixed $name;
    private mixed $description;
    private mixed $image;

    /**
     * @param mixed $id
     * @param mixed $name
     * @param mixed $description
     * @param mixed $image
     */
    public function __construct(mixed $id, mixed $name, mixed $description, mixed $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName(): mixed
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription(): mixed
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getImage(): mixed
    {
        return $this->image;
    }



}
