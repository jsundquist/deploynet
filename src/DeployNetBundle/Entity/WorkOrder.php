<?php
namespace DeployNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class WorkOrder
 * @package DeployNetBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="work_orders")
 */
class WorkOrder
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100, name="name")
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=100, name="status")
     */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="work_orders")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;

    /**
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="work_orders")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    protected $location;

    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="work_orders")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;

    public function __construct()
    {

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
     * Set name
     *
     * @param string $name
     * @return WorkOrder
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return WorkOrder
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set customer
     *
     * @param \DeployNetBundle\Entity\Customer $customer
     * @return WorkOrder
     */
    public function setCustomer(\DeployNetBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;
    
        return $this;
    }

    /**
     * Get customer
     *
     * @return \DeployNetBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set location
     *
     * @param \DeployNetBundle\Entity\Location $location
     * @return WorkOrder
     */
    public function setLocation(\DeployNetBundle\Entity\Location $location = null)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return \DeployNetBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set project
     *
     * @param \DeployNetBundle\Entity\Project $project
     * @return WorkOrder
     */
    public function setProject(\DeployNetBundle\Entity\Project $project = null)
    {
        $this->project = $project;
    
        return $this;
    }

    /**
     * Get project
     *
     * @return \DeployNetBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }
}
