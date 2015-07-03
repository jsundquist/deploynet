<?php
namespace DeployNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class State
 * @package DeployNetBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="states")
 */
class State {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=2)
     */
    protected $abbreviation;

    /**
     * @ORM\OneToMany(targetEntity="Customer", mappedBy="state_id")
     */
    protected $customers;

    /**
     * @ORM\OneToMany(targetEntity="Location", mappedBy="state_id")
     */
    protected $locations;

    public function __construct()
    {
        $this->customers = new ArrayCollection();
        $this->locations = new ArrayCollection();
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
     * @return State
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
     * Set abbreviation
     *
     * @param string $abbreviation
     * @return State
     */
    public function setAbbreviation($abbreviation)
    {
        $this->abbreviation = $abbreviation;
    
        return $this;
    }

    /**
     * Get abbreviation
     *
     * @return string 
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * Add customers
     *
     * @param \DeployNetBundle\Entity\Customer $customers
     * @return State
     */
    public function addCustomer(\DeployNetBundle\Entity\Customer $customers)
    {
        $this->customers[] = $customers;
    
        return $this;
    }

    /**
     * Remove customers
     *
     * @param \DeployNetBundle\Entity\Customer $customers
     */
    public function removeCustomer(\DeployNetBundle\Entity\Customer $customers)
    {
        $this->customers->removeElement($customers);
    }

    /**
     * Get customers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * Add locations
     *
     * @param \DeployNetBundle\Entity\Location $locations
     * @return State
     */
    public function addLocation(\DeployNetBundle\Entity\Location $locations)
    {
        $this->locations[] = $locations;
    
        return $this;
    }

    /**
     * Remove locations
     *
     * @param \DeployNetBundle\Entity\Location $locations
     */
    public function removeLocation(\DeployNetBundle\Entity\Location $locations)
    {
        $this->locations->removeElement($locations);
    }

    /**
     * Get locations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocations()
    {
        return $this->locations;
    }
}
