<?php
namespace DeployNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Product
 * @package DeployNetBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Product
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100, name="part_number")
     */
    protected $partNumber;

    /**
     * @ORM\Column(type="string", length=100, name="alt_part_number")
     */
    protected $altPartNumber;

    /**
     * @ORM\Column(type="string", length=250)
     */
    protected $description;

    /**
     * @ORM\Column(type="boolean", options={"default"="1"})
     */
    protected $serialized;

    /**
     * @ORM\Column(type="integer", name="manufacturer_id")
     */
    protected $manufacturerId;

    /**
     * @ORM\ManyToOne(targetEntity="Manufacturer", inversedBy="products")
     * @ORM\JoinColumn(name="manufacturer_id", referencedColumnName="id")
     */
    protected $manufacturer;

    /**
     * @ORM\OneToMany(targetEntity="WorkOrderLine", mappedBy="product")
     */
    protected $workOrderLines;

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
     * Set partNumber
     *
     * @param string $partNumber
     * @return Product
     */
    public function setPartNumber($partNumber)
    {
        $this->partNumber = $partNumber;
    
        return $this;
    }

    /**
     * Get partNumber
     *
     * @return string
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * Set altPartNumber
     *
     * @param string $altPartNumber
     * @return Product
     */
    public function setAltPartNumber($altPartNumber)
    {
        $this->altPartNumber = $altPartNumber;
    
        return $this;
    }

    /**
     * Get altPartNumber
     *
     * @return string
     */
    public function getAltPartNumber()
    {
        return $this->altPartNumber;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
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
     * Set manufacturerId
     *
     * @param integer $manufacturerId
     * @return Product
     */
    public function setManufacturerId($manufacturerId)
    {
        $this->manufacturerId = $manufacturerId;
    
        return $this;
    }

    /**
     * Get manufacturerId
     *
     * @return integer
     */
    public function getManufacturerId()
    {
        return $this->manufacturerId;
    }

    /**
     * Set manufacturerName
     *
     * @param Manufacturer $manufacturer
     * @return Product
     */
    public function setManufacturer(Manufacturer $manufacturer = null)
    {
        $this->manufacturer = $manufacturer;
    
        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return Manufacturer
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set serialized
     *
     * @param boolean $serialized
     * @return Product
     */
    public function setSerialized($serialized)
    {
        $this->serialized = $serialized;

        return $this;
    }

    /**
     * Get serialized
     *
     * @return boolean 
     */
    public function getSerialized()
    {
        return $this->serialized;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->workOrderLine = new ArrayCollection();
    }

    /**
     * Add workOrderLine
     *
     * @param WorkOrderLine $workOrderLine
     * @return Product
     */
    public function addWorkOrderLine(WorkOrderLine $workOrderLine)
    {
        $this->workOrderLine[] = $workOrderLine;

        return $this;
    }

    /**
     * Remove workOrderLine
     *
     * @param WorkOrderLine $workOrderLine
     */
    public function removeWorkOrderLine(WorkOrderLine $workOrderLine)
    {
        $this->workOrderLine->removeElement($workOrderLine);
    }

    /**
     * Get workOrderLine
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWorkOrderLine()
    {
        return $this->workOrderLine;
    }
}
