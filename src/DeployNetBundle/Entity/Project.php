<?php
namespace DeployNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Project
 * @package DeployNetBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="projects")
 */
class Project
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
     * @ORM\Column(type="string", length=100, name="description")
     */
    protected $description;

    /**
     * @ORM\Column(type="string", length=100, name="type")
     */
    protected $type;

    /**
     * The number of work orders open for the project
     *
     * @var integer
     */
    protected $activeWorkOrders;

    /**
     * @ORM\Column(type="datetime", name="last_access", nullable=true)
     */
    protected $lastAccess;

    /**
     * @ORM\Column(type="string", length=100, name="status", options={"default"="Open"}, nullable=true)
     */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="projects")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;

    /**
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="projects")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    protected $location;

    /**
     * Date the project was created
     *
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $createdDate;

    /**
     * @ORM\OneToMany(targetEntity="WorkOrder", mappedBy="project")
     */
    protected $workOrders;

    public function __construct()
    {
        $this->workOrders = new ArrayCollection();
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
     * @return Project
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
     * Set description
     *
     * @param string $description
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Project
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Project
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
     * @param Customer $customer
     * @return Project
     */
    public function setCustomer(Customer $customer = null)
    {
        $this->customer = $customer;
    
        return $this;
    }

    /**
     * Get customer
     *
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set location
     *
     * @param Location $location
     * @return Project
     */
    public function setLocation(Location $location = null)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Add workOrders
     *
     * @param WorkOrder $workOrders
     * @return Project
     */
    public function addWorkOrder(WorkOrder $workOrders)
    {
        $this->workOrders[] = $workOrders;
    
        return $this;
    }

    /**
     * Remove workOrders
     *
     * @param WorkOrder $workOrders
     */
    public function removeWorkOrder(WorkOrder $workOrders)
    {
        $this->workOrders->removeElement($workOrders);
    }

    /**
     * Get workOrders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWorkOrders()
    {
        return $this->workOrders;
    }

    public function getActiveWorkOrders()
    {
        $activeWorkOrders = 0;
        foreach ($this->workOrders as $workOrder) {
            if ($workOrder->getStatus() == '') {
                $activeWorkOrders++;
            }
        }

        return $activeWorkOrders;
    }

    /**
     * Set lastAccess
     *
     * @param \DateTime $lastAccess
     * @return Project
     */
    public function setLastAccess($lastAccess)
    {
        $this->lastAccess = $lastAccess;
    
        return $this;
    }

    /**
     * Get lastAccess
     *
     * @return \DateTime
     */
    public function getLastAccess()
    {
        return $this->lastAccess;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return Project
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }
}
