<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 2/21/17
 * Time: 5:02 PM
 */

namespace BlogBundle\Entity;


use DateTime;

class Blog
{
    private $id;
    private $createdBy;
    private $name;
    private $description;
    private $createdDate;
    private $lastUpdatedDate;
    private $lastPostedDate;
    private $isPublished;

    /**
     * Blog constructor.
     */
    public function __construct()
    {
        $this->createdDate = new DateTime();
        $this->lastUpdatedDate = new DateTime();
        $this->isPublished = false;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param mixed $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param mixed $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return mixed
     */
    public function getLastUpdatedDate()
    {
        return $this->lastUpdatedDate;
    }

    /**
     * @param mixed $lastUpdatedDate
     */
    public function setLastUpdatedDate($lastUpdatedDate)
    {
        $this->lastUpdatedDate = $lastUpdatedDate;
    }

    /**
     * @return mixed
     */
    public function getLastPostedDate()
    {
        return $this->lastPostedDate;
    }

    /**
     * @param mixed $lastPostedDate
     */
    public function setLastPostedDate($lastPostedDate)
    {
        $this->lastPostedDate = $lastPostedDate;
    }

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * @param mixed $isPublished
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    }

    public function toArray(){
        return [
            'id' => $this->id,
            'created_by' => $this->createdBy,
            'name' => $this->name,
            'description' => $this->description,
            'createdDate' => $this->createdDate,
            'lastUpdatedDate' => $this->lastUpdatedDate,
            'lastPostedDate' => $this->lastPostedDate,
            'isPublished' => $this->isPublished
        ];
    }


}