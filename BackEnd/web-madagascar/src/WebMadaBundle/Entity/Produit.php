<?php

namespace WebMadaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="WebMadaBundle\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=55)
     */
    private $designation;
       /**
* @ORM\ManyToOne(targetEntity="WebMadaBundle\Entity\Categorie")
* @ORM\JoinColumn(nullable=true,onDelete="cascade")
*/
private $identification_categorie;
    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Produit
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Produit
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set identificationCategorie
     *
     * @param \WebMadaBundle\Entity\Categorie $identificationCategorie
     *
     * @return Produit
     */
    public function setIdentificationCategorie(\WebMadaBundle\Entity\Categorie $identificationCategorie = null)
    {
        $this->identification_categorie = $identificationCategorie;

        return $this;
    }

    /**
     * Get identificationCategorie
     *
     * @return \WebMadaBundle\Entity\Categorie
     */
    public function getIdentificationCategorie()
    {
        return $this->identification_categorie;
    }
}
