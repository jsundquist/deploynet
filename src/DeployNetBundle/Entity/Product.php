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
     * @ORM\Column(type="integer", name="manufacturer_id")
     */
    protected $manufacturerId;

    /**
     * @ORM\ManyToOne(targetEntity="Manufacturer", inversedBy="products")
     * @ORM\JoinColumn(name="manufacturer_id", referencedColumnName="id")
     */
    protected $manufacturerName;

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
     * @param \DeployNetBundle\Entity\Manufacturer $manufacturerName
     * @return Product
     */
    public function setManufacturerName(\DeployNetBundle\Entity\Manufacturer $manufacturerName = null)
    {
        $this->manufacturerName = $manufacturerName;
    
        return $this;
    }

    /**
     * Get manufacturerName
     *
     * @return \DeployNetBundle\Entity\Manufacturer 
     */
    public function getManufacturerName()
    {
        return $this->manufacturerName;
    }
}
