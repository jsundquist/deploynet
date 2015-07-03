<?php
namespace DeployNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Location
 * @package DeployNetBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="locations")
 */
class Location
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", name="customer_id")
     */
    protected $customerId;

    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="locations")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;

    /**
     * @ORM\Column(type="string", length=100, name="name")
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=100, name="site_id")
     */
    protected $siteId;

    /**
     * @ORM\Column(type="string", length=100, name="address1")
     */
    protected $address1;

    /**
     * @ORM\Column(type="string", length=100, name="address2")
     */
    protected $address2;

    /**
     * @ORM\Column(type="string", length=100, name="address3")
     */
    protected $address3;

    /**
     * @ORM\Column(type="string", length=100, name="city")
     */
    protected $city;

    /**
     * @ORM\Column(type="integer", length=100, name="state_id")
     */
    protected $stateId;

    /**
     * @ORM\ManyToOne(targetEntity="State", inversedBy="locations")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     */
    protected $state;

    /**
     * @ORM\Column(type="string", length=100, name="postal_code")
     */
    protected $postalCode;

    /**
     * @ORM\Column(type="string", length=100, name="phone_number")
     */
    protected $phoneNumber;

    /**
     * @ORM\Column(type="string", length=100, name="fax_number")
     */
    protected $faxNumber;

    /**
     * @ORM\Column(type="string", length=100, name="active")
     */
    protected $active;

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
     * Set customerId
     *
     * @param integer $customerId
     * @return Location
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    
        return $this;
    }

    /**
     * Get customerId
     *
     * @return integer 
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Location
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
     * Set address1
     *
     * @param string $address1
     * @return Location
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    
        return $this;
    }

    /**
     * Get address1
     *
     * @return string 
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     * @return Location
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    
        return $this;
    }

    /**
     * Get address2
     *
     * @return string 
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set address3
     *
     * @param string $address3
     * @return Location
     */
    public function setAddress3($address3)
    {
        $this->address3 = $address3;
    
        return $this;
    }

    /**
     * Get address3
     *
     * @return string 
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Location
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set stateId
     *
     * @param string $stateId
     * @return Location
     */
    public function setStateId($stateId)
    {
        $this->stateId = $stateId;
    
        return $this;
    }

    /**
     * Get stateId
     *
     * @return string 
     */
    public function getStateId()
    {
        return $this->stateId;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     * @return Location
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    
        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return Location
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    
        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set faxNumber
     *
     * @param string $faxNumber
     * @return Location
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;
    
        return $this;
    }

    /**
     * Get faxNumber
     *
     * @return string 
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * Set active
     *
     * @param string $active
     * @return Location
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return string 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set customer
     *
     * @param \DeployNetBundle\Entity\Customer $customer
     * @return Location
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
     * Set siteId
     *
     * @param string $siteId
     * @return Location
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    
        return $this;
    }

    /**
     * Get siteId
     *
     * @return string 
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * Set state
     *
     * @param \DeployNetBundle\Entity\State $state
     * @return Location
     */
    public function setState(\DeployNetBundle\Entity\State $state = null)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return \DeployNetBundle\Entity\State 
     */
    public function getState()
    {
        return $this->state;
    }
}
