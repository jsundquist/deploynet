<?php
namespace DeployNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="string", length=100, name="status", options={"default"="New"}, nullable=true)
     */
    protected $status;

    /**
     * @ORM\Column(type="date", name="schedule_date")
     */
    protected $scheduleDate;

    /**
     * @ORM\Column(type="datetime", name="created_date")
     */
    protected $createdDate;

    /**
     * @ORM\Column(type="datetime", name="close_date", nullable=true)
     */
    protected $closeDate;

    /**
     * @ORM\Column(type="integer", name="work_order_type_id")
     */
    protected $type;

    /**
     * @ORM\Column(type="string", length=255, name="short_description")
     */
    protected $shortDescription;

    /**
     * @ORM\Column(type="text", name="long_description")
     */
    protected $longDescription;

    /**
     * @ORM\Column(type="string", length=100, name="po_number", nullable=true)
     */
    protected $poNumber;

    /**
     * @ORM\Column(type="integer", length=100, name="location_id")
     */
    protected $locationId;

    /**
     * @ORM\Column(type="integer", length=100, name="project_id")
     */
    protected $projectId;

    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="workOrders")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;

    /**
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="workOrders")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    protected $location;

    /**
     * @ORM\OneToMany(targetEntity="WorkOrderLines", mappedBy="workOrder")
     */
    protected $workOrderLines;

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
     * Set location
     *
     * @param Location $location
     * @return WorkOrder
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
     * Set project
     *
     * @param Project $project
     * @return WorkOrder
     */
    public function setProject(Project $project = null)
    {
        $this->project = $project;
    
        return $this;
    }

    /**
     * Get project
     *
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set locationId
     *
     * @param integer $locationId
     * @return Workorder
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;

        return $this;
    }

    /**
     * Get locationId
     *
     * @return integer 
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Set projectId
     *
     * @param integer $projectId
     * @return Workorder
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * Get projectId
     *
     * @return integer 
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set scheduleDate
     *
     * @param \DateTime $scheduleDate
     * @return WorkOrder
     */
    public function setScheduleDate($scheduleDate)
    {
        $this->scheduleDate = $scheduleDate;

        return $this;
    }

    /**
     * Get scheduleDate
     *
     * @return \DateTime 
     */
    public function getScheduleDate()
    {
        return $this->scheduleDate;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return WorkOrder
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

    /**
     * Set closeDate
     *
     * @param \DateTime $closeDate
     * @return WorkOrder
     */
    public function setCloseDate($closeDate)
    {
        $this->closeDate = $closeDate;

        return $this;
    }

    /**
     * Get closeDate
     *
     * @return \DateTime 
     */
    public function getCloseDate()
    {
        return $this->closeDate;
    }

    /**
     * Set type
     *
     * @param $type
     * @return WorkOrder
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \int 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return WorkOrder
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set longDescription
     *
     * @param string $longDescription
     * @return WorkOrder
     */
    public function setLongDescription($longDescription)
    {
        $this->longDescription = $longDescription;

        return $this;
    }

    /**
     * Get longDescription
     *
     * @return string 
     */
    public function getLongDescription()
    {
        return $this->longDescription;
    }

    /**
     * Set poNumber
     *
     * @param string $poNumber
     * @return WorkOrder
     */
    public function setPoNumber($poNumber)
    {
        $this->poNumber = $poNumber;

        return $this;
    }

    /**
     * Get poNumber
     *
     * @return string 
     */
    public function getPoNumber()
    {
        return $this->poNumber;
    }
}
