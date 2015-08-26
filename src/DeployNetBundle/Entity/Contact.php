<?php
namespace DeployNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Customer
 * @package DeployNetBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="contacts")
 */
class Contact
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100, name="first_name")
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=100, name="last_name")
     */
    protected $lastName;

    /**
     * @ORM\Column(type="string", length=100, name="address1")
     */
    protected $address1;

    /**
     * @ORM\Column(type="string", length=100, name="address2", nullable=true)
     */
    protected $address2;

    /**
     * @ORM\Column(type="string", length=100, name="city")
     */
    protected $city;

    /**
     * @ORM\Column(type="integer", length=100, name="state_id")
     */
    protected $stateId;

    /**
     * @ORM\ManyToOne(targetEntity="State", inversedBy="contacts")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     */
    protected $state;

    /**
     * @ORM\Column(type="string", length=100, name="postal_code")
     */
    protected $postalCode;

    /**
     * @ORM\Column(type="string", length=100, name="phone_number", nullable=true)
     */
    protected $phoneNumber;

    /**
     * @ORM\Column(type="string", length=100, name="fax_number", nullable=true)
     */
    protected $faxNumber;

    /**
     * @ORM\Column(type="string", length=100, name="cell_number", nullable=true)
     */
    protected $cellNumber;

    /**
     * @ORM\Column(type="string", length=100, name="email", nullable=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="integer", length=100, name="customer_id")
     */
    protected $customerId;

    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="contacts")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;

    /**
     * @ORM\Column(type="integer", length=100, name="location_id", nullable=true)
     */
    protected $locationId = null;

    /**
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="contacts")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    protected $location;

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
     * Set firstName
     *
     * @param string $firstName
     * @return Contact
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
     * @return Contact
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

    /**
     * Set address1
     *
     * @param string $address1
     * @return Contact
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
     * @return Contact
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
     * Set city
     *
     * @param string $city
     * @return Contact
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
     * @param integer $stateId
     * @return Contact
     */
    public function setStateId($stateId)
    {
        $this->stateId = $stateId;

        return $this;
    }

    /**
     * Get stateId
     *
     * @return integer 
     */
    public function getStateId()
    {
        return $this->stateId;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     * @return Contact
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
     * @return Contact
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
     * @return Contact
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
     * Set cellNumber
     *
     * @param string $cellNumber
     * @return Contact
     */
    public function setCellNumber($cellNumber)
    {
        $this->cellNumber = $cellNumber;

        return $this;
    }

    /**
     * Get cellNumber
     *
     * @return string 
     */
    public function getCellNumber()
    {
        return $this->cellNumber;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set customerId
     *
     * @param integer $customerId
     * @return Contact
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
     * Set locationId
     *
     * @param integer $locationId
     * @return Contact
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
     * Set state
     *
     * @param \DeployNetBundle\Entity\State $state
     * @return Contact
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

    /**
     * Set customer
     *
     * @param \DeployNetBundle\Entity\Customer $customer
     * @return Contact
     */
    public function setCustomer(\DeployNetBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \DeployNetBundle\Entity\State 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set location
     *
     * @param \DeployNetBundle\Entity\Location $location
     * @return Contact
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
}
