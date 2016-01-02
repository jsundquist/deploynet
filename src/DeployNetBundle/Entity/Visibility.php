<?php
namespace DeployNetBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Visibility
 * @package DeployNetBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="visibility")
 */
class Visibility
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="WorkOrderDocument", mappedBy="visibility")
     */
    private $documents;

    /**
     * @ORM\ManyToMany(targetEntity="WorkOrderComment", mappedBy="visibility")
     */
    private $comments;

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
     * @return WorkOrderDocumentVisibility
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
     * Constructor
     */
    public function __construct()
    {
        $this->documents = new ArrayCollection();
    }

    /**
     * Add documents
     *
     * @param WorkOrderDocument $documents
     * @return Visibility
     */
    public function addDocument(WorkOrderDocument $documents)
    {
        $this->documents[] = $documents;

        return $this;
    }

    /**
     * Remove documents
     *
     * @param WorkOrderDocument $documents
     */
    public function removeDocument(WorkOrderDocument $documents)
    {
        $this->documents->removeElement($documents);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Add comments
     *
     * @param \DeployNetBundle\Entity\WorkOrderComment $comments
     * @return Visibility
     */
    public function addComment(\DeployNetBundle\Entity\WorkOrderComment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \DeployNetBundle\Entity\WorkOrderComment $comments
     */
    public function removeComment(\DeployNetBundle\Entity\WorkOrderComment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
