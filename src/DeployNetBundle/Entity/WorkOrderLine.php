<?php

namespace DeployNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WorkOrderLine
 *
 * @ORM\Table("work_order_lines")
 * @ORM\Entity
 */
class WorkOrderLine
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
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer")
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="serial_number_in", type="string", length=255, nullable=true)
     */
    private $serialNumberIn;

    /**
     * @var string
     *
     * @ORM\Column(name="serial_number_out", type="string", length=255, nullable=true)
     */
    private $serialNumberOut;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_line_status_id", type="integer")
     */
    private $orderLineStatusId;

    /**
     * @var string
     *
     * @ORM\Column(name="work_preformed", type="text", nullable=true)
     */
    private $workPreformed;

    /**
     * @var string
     *
     * @ORM\Column(name="problem_found", type="text", nullable=true)
     */
    private $problemFound;

    /**
     * @var integer
     *
     * @ORM\Column(name="nri", type="smallint", nullable=true)
     */
    private $nri;

    /**
     * @var integer
     *
     * @ORM\Column(name="doa", type="smallint", nullable=true)
     */
    private $doa;

    /**
     * @var integer
     *
     * @ORM\Column(name="found_doa", type="smallint", nullable=true)
     */
    private $foundDoa;

    /**
     * @ORM\ManyToOne(targetEntity="WorkOrder", inversedBy="workOrderLines")
     * @ORM\JoinColumn(name="work_order_id", referencedColumnName="id")
     */
    protected $workOrder;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="workOrderLines")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;

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
     * Set productId
     *
     * @param integer $productId
     * @return WorkOrderLine
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return WorkOrderLine
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
     * Set serialNumberIn
     *
     * @param string $serialNumberIn
     * @return WorkOrderLine
     */
    public function setSerialNumberIn($serialNumberIn)
    {
        $this->serialNumberIn = $serialNumberIn;

        return $this;
    }

    /**
     * Get serialNumberIn
     *
     * @return string 
     */
    public function getSerialNumberIn()
    {
        return $this->serialNumberIn;
    }

    /**
     * Set serialNumberOut
     *
     * @param string $serialNumberOut
     * @return WorkOrderLine
     */
    public function setSerialNumberOut($serialNumberOut)
    {
        $this->serialNumberOut = $serialNumberOut;

        return $this;
    }

    /**
     * Get serialNumberOut
     *
     * @return string 
     */
    public function getSerialNumberOut()
    {
        return $this->serialNumberOut;
    }

    /**
     * Set orderLineStatusId
     *
     * @param integer $orderLineStatusId
     * @return WorkOrderLine
     */
    public function setOrderLineStatusId($orderLineStatusId)
    {
        $this->orderLineStatusId = $orderLineStatusId;

        return $this;
    }

    /**
     * Get orderLineStatusId
     *
     * @return integer 
     */
    public function getOrderLineStatusId()
    {
        return $this->orderLineStatusId;
    }

    /**
     * Set workPreformed
     *
     * @param string $workPreformed
     * @return WorkOrderLine
     */
    public function setWorkPreformed($workPreformed)
    {
        $this->workPreformed = $workPreformed;

        return $this;
    }

    /**
     * Get workPreformed
     *
     * @return string 
     */
    public function getWorkPreformed()
    {
        return $this->workPreformed;
    }

    /**
     * Set problemFound
     *
     * @param string $problemFound
     * @return WorkOrderLine
     */
    public function setProblemFound($problemFound)
    {
        $this->problemFound = $problemFound;

        return $this;
    }

    /**
     * Get problemFound
     *
     * @return string 
     */
    public function getProblemFound()
    {
        return $this->problemFound;
    }

    /**
     * Set nri
     *
     * @param integer $nri
     * @return WorkOrderLine
     */
    public function setNri($nri)
    {
        $this->nri = $nri;

        return $this;
    }

    /**
     * Get nri
     *
     * @return integer 
     */
    public function getNri()
    {
        return $this->nri;
    }

    /**
     * Set doa
     *
     * @param integer $doa
     * @return WorkOrderLine
     */
    public function setDoa($doa)
    {
        $this->doa = $doa;

        return $this;
    }

    /**
     * Get doa
     *
     * @return integer 
     */
    public function getDoa()
    {
        return $this->doa;
    }

    /**
     * Set foundDoa
     *
     * @param integer $foundDoa
     * @return WorkOrderLine
     */
    public function setFoundDoa($foundDoa)
    {
        $this->foundDoa = $foundDoa;

        return $this;
    }

    /**
     * Get foundDoa
     *
     * @return integer 
     */
    public function getFoundDoa()
    {
        return $this->foundDoa;
    }

    /**
     * Set workOrder
     *
     * @param WorkOrder $workOrder
     * @return WorkOrderLine
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
     * Set product
     *
     * @param \DeployNetBundle\Entity\Product $product
     * @return WorkOrderLine
     */
    public function setProduct(\DeployNetBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \DeployNetBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
