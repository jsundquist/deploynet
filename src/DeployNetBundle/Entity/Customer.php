<?php
namespace DeployNetBundle\Entity;

use DeployNetBundle\Entity\Location;
use DeployNetBundle\Entity\State;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Customer
 * @package DeployNetBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="customers")
 */
class Customer
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
     * @ORM\Column(type="string", length=100, name="address1")
     */
    protected $address1;

    /**
     * @ORM\Column(type="string", length=100, name="address2", nullable=true)
     */
    protected $address2;

    /**
     * @ORM\Column(type="string", length=100, name="address3", nullable=true)
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
     * @ORM\ManyToOne(targetEntity="State", inversedBy="customers")
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
     * @ORM\Column(type="boolean", name="active", options={"default": 1})
     */
    protected $active = true;

    /**
     * @ORM\OneToMany(targetEntity="Location", mappedBy="customer")
     */
    protected $locations;

    /**
     * @ORM\OneToMany(targetEntity="Contact", mappedBy="customer")
     */
    protected $contacts;

    /**
     * @ORM\OneToMany(targetEntity="Project", mappedBy="customer")
     */
    protected $projects;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
        $this->contacts = new ArrayCollection();
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
     * @return Customer
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
     * @return Customer
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
     * @return Customer
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
     * @return Customer
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
     * @return Customer
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
     * @return Customer
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
     * @return Customer
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
     * @return Customer
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
     * @return Customer
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
     * @param bool $active
     * @return Customer
     */
    public function setActive($active = true)
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
     * Add locations
     *
     * @param Location $locations
     * @return Customer
     */
    public function addLocation(Location $locations)
    {
        $this->locations[] = $locations;
    
        return $this;
    }

    /**
     * Remove locations
     *
     * @param Location $locations
     */
    public function removeLocation(Location $locations)
    {
        $this->locations->removeElement($locations);
    }

    /**
     * Get locations
     *
     * @return Collection
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * Set state
     *
     * @param State $state
     * @return Customer
     */
    public function setState(State $state = null)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return State
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Add contacts
     *
     * @param Contact $contacts
     * @return Customer
     */
    public function addContact(Contact $contacts)
    {
        $this->contacts[] = $contacts;

        return $this;
    }

    /**
     * Remove contacts
     *
     * @param Contact $contacts
     */
    public function removeContact(Contact $contacts)
    {
        $this->contacts->removeElement($contacts);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Add projects
     *
     * @param Project $projects
     * @return Customer
     */
    public function addProject(Project $projects)
    {
        $this->projects[] = $projects;

        return $this;
    }

    /**
     * Remove projects
     *
     * @param Project $projects
     */
    public function removeProject(Project $projects)
    {
        $this->projects->removeElement($projects);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjects()
    {
        return $this->projects;
    }
}
