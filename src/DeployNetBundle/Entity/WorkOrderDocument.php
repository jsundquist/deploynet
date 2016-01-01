<?php
namespace DeployNetBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * WorkOrderDocument
 * @package DeployNetBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="work_order_documents")
 */
class WorkOrderDocument
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="fileName", type="string", length=255)
     */
    private $fileName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer")
     */
    private $size;

    /**
     * Owning Side
     *
     * @ORM\ManyToMany(targetEntity="Visibility", inversedBy="documents")
     * @ORM\JoinTable(name="work_order_document_visibility",
     *      joinColumns={@ORM\JoinColumn(name="document_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="visibility_id", referencedColumnName="id")}
     *      )
     */
    private $visibility;

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
     * Set fileName
     *
     * @param string $fileName
     * @return WorkOrderDocument
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string 
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return WorkOrderDocument
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
     * @return WorkOrderDocument
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
     * Set size
     *
     * @param integer $size
     * @return WorkOrderDocument
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer 
     */
    public function getSize()
    {
        return $this->size;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->visibility = new ArrayCollection();
    }

    /**
     * Add visibility
     *
     * @param Visibility $visibility
     * @return WorkOrderDocument
     */
    public function addVisibility(Visibility $visibility)
    {
        $this->visibility[] = $visibility;

        return $this;
    }

    /**
     * Remove visibility
     *
     * @param Visibility $visibility
     */
    public function removeVisibility(Visibility $visibility)
    {
        $this->visibility->removeElement($visibility);
    }

    /**
     * Get visibility
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVisibility()
    {
        return $this->visibility;
    }
}
