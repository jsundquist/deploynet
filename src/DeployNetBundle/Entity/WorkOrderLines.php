<?php

namespace DeployNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderList
 *
 * @ORM\Table("order_lines")
 * @ORM\Entity
 */
class WorkOrderLines
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
     * @ORM\Column(name="order_id", type="integer")
     */
    private $orderId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer")
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="serial_number_in", type="string", length=255)
     */
    private $serialNumberIn;

    /**
     * @var string
     *
     * @ORM\Column(name="serial_number_out", type="string", length=255)
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
     * @ORM\Column(name="work_preformed", type="text")
     */
    private $workPreformed;

    /**
     * @var string
     *
     * @ORM\Column(name="problem_found", type="text")
     */
    private $problemFound;

    /**
     * @var integer
     *
     * @ORM\Column(name="nri", type="smallint")
     */
    private $nri;

    /**
     * @var integer
     *
     * @ORM\Column(name="doa", type="smallint")
     */
    private $doa;

    /**
     * @var integer
     *
     * @ORM\Column(name="found_doa", type="smallint")
     */
    private $foundDoa;

    /**
     * @ORM\ManyToOne(targetEntity="WorkOrder", inversedBy="workOrder")
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
     * Set orderId
     *
     * @param integer $orderId
     * @return OrderList
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return integer 
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     * @return OrderList
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
     * @return OrderList
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
     * @return OrderList
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
     * @return OrderList
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
     * @return OrderList
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
     * @return OrderList
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
     * @return OrderList
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
     * @return OrderList
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
     * @return OrderList
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
     * @return OrderList
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
}
