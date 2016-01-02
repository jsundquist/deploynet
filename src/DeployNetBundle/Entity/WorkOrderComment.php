<?php
namespace DeployNetBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * WorkOrderComment
 * @package DeployNetBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="work_order_comments")
 * @ORM\HasLifecycleCallbacks
 */
class WorkOrderComment
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
     * Who posted the comment
     *
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $author;

    /**
     * Date comment was posted
     *
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $commentDate;

    /**
     * Date Uploaded
     *
     * @var string
     * @ORM\Column(type="text", nullable=false)
     */
    private $comment;

    /**
     * Date Uploaded
     *
     * @var string
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $important;

    /**
     * Owning Side
     *
     * @ORM\ManyToMany(targetEntity="Visibility", inversedBy="comments")
     * @ORM\JoinTable(name="work_order_comment_visibility",
     *      joinColumns={@ORM\JoinColumn(name="document_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="visibility_id", referencedColumnName="id")}
     *      )
     */
    private $visibility;

    /**
     * @ORM\ManyToOne(targetEntity="WorkOrder", inversedBy="workOrderComments")
     * @ORM\JoinColumn(name="work_order_id", referencedColumnName="id")
     */
    private $workOrder;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->visibility = new ArrayCollection();
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
     * Set commentDate
     *
     * @param \DateTime $commentDate
     * @return WorkOrderComment
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;

        return $this;
    }

    /**
     * Get commentDate
     *
     * @return \DateTime 
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return WorkOrderComment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Add visibility
     *
     * @param Visibility $visibility
     * @return WorkOrderComment
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
     * @param WorkOrder $workOrder
     * @return WorkOrderComment
     */
    public function setWorkOrder(WorkOrder $workOrder = null)
    {
        $this->workOrder = $workOrder;

        return $this;
    }

    /**
     * Get workOrder
     *
     * @return WorkOrder
     */
    public function getWorkOrder()
    {
        return $this->workOrder;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return WorkOrderComment
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set important
     *
     * @param boolean $important
     * @return WorkOrderComment
     */
    public function setImportant($important)
    {
        $this->important = $important;

        return $this;
    }

    /**
     * Get important
     *
     * @return boolean 
     */
    public function getImportant()
    {
        return $this->important;
    }

    /**
     * Called before saving the entity
     *
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        $this->commentDate = new \DateTime('now');
    }
}
