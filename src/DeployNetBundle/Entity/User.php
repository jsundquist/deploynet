<?php
namespace DeployNetBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Product
 * @package DeployNetBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100, name="first_name", nullable=true)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=100, name="last_name", nullable=true)
     */
    protected $lastName;

    protected $fullName;

    /**
     * @ORM\OneToMany(targetEntity="WorkOrderComment", mappedBy="author")
     */
    protected $workOrderComments;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * Add workOrderComments
     *
     * @param WorkOrderComment $workOrderComments
     * @return User
     */
    public function addWorkOrderComment(WorkOrderComment $workOrderComments)
    {
        $this->workOrderComments[] = $workOrderComments;

        return $this;
    }

    /**
     * Remove workOrderComments
     *
     * @param WorkOrderComment $workOrderComments
     */
    public function removeWorkOrderComment(WorkOrderComment $workOrderComments)
    {
        $this->workOrderComments->removeElement($workOrderComments);
    }

    /**
     * Get workOrderComments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWorkOrderComments()
    {
        return $this->workOrderComments;
    }
}
