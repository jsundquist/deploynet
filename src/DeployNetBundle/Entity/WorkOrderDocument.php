<?php
namespace DeployNetBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * WorkOrderDocument
 * @package DeployNetBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="work_order_documents")
 * @ORM\HasLifecycleCallbacks
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
     * Image file
     *
     * @var File
     *
     * @Assert\File(
     *     maxSize = "5M",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
     *     maxSizeMessage = "The maxmimum allowed file size is 5MB.",
     *     mimeTypesMessage = "Only the filetypes image are allowed."
     * )
     */
    protected $file;

    /**
     * Image path
     *
     * @var string
     *
     * @ORM\Column(type="text", length=255, nullable=false)
     */
    protected $path;

    /**
     * Description of the file
     *
     * @var string
     *
     * @ORM\Column(type="text", nullable=false)
     */
    protected $description;

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
     * @ORM\ManyToOne(targetEntity="WorkOrder", inversedBy="workOrderDocuments")
     * @ORM\JoinColumn(name="work_order_id", referencedColumnName="id")
     */
    protected $workOrder;

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

    /**
     * Set workOrder
     *
     * @param \DeployNetBundle\Entity\WorkOrder $workOrder
     * @return WorkOrderDocument
     */
    public function setWorkOrder(\DeployNetBundle\Entity\WorkOrder $workOrder = null)
    {
        $this->workOrder = $workOrder;

        return $this;
    }

    /**
     * Get workOrder
     *
     * @return \DeployNetBundle\Entity\WorkOrder 
     */
    public function getWorkOrder()
    {
        return $this->workOrder;
    }

    /**
     * Called before saving the entity
     *
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->file->guessExtension();
        }
    }



    /**
     * Called after entity persistence
     *
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        // The file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }

        // Use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->file->move(
            $this->getUploadRootDir(),
            $this->path
        );

        // Set the path property to the filename where you've saved the file
        $this->path = $this->file->getClientOriginalName();

        // Clean up the file property as you won't need it anymore
        $this->file = null;
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'documents';
    }

    /**
     * Set path
     *
     * @param string $path
     * @return WorkOrderDocument
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return WorkOrderDocument
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
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
}
