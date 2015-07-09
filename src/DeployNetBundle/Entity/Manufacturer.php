<?php
namespace DeployNetBundle\Entity;

use DeployNetBundle\Entity\Product;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Manufacturer
 * @package DeployNetBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="manufacturers")
 */
class Manufacturer
{
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
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     */
    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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
     * @return Manufacturer
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
     * Add products
     *
     * @param Product $products
     * @return Manufacturer
     */
    public function addProduct(Product $products)
    {
        $this->products[] = $products;
    
        return $this;
    }

    /**
     * Remove products
     *
     * @param Product $products
     */
    public function removeProduct(Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return Collection
     */
    public function getProducts()
    {
        return $this->products;
    }
}
