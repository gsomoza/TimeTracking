<?php

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Worklog
 */
class Worklog
{
    /**
     * @var float
     */
    private $duration;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Db\Entity\User
     */
    private $user;


    /**
     * Set duration
     *
     * @param float $duration
     * @return Worklog
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return float 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Worklog
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Worklog
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \Db\Entity\User $user
     * @return Worklog
     */
    public function setUser(\Db\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Db\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
