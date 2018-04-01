<?php

namespace WebMadaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="WebMadaBundle\Repository\CategorieRepository")
 */
class Categorie
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
     * @ORM\Column(name="LibelleCategorie", type="string", length=55)
     */
    private $libelleCategorie;


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
     * Set libelleCategorie
     *
     * @param string $libelleCategorie
     *
     * @return Categorie
     */
    public function setLibelleCategorie($libelleCategorie)
    {
        $this->libelleCategorie = $libelleCategorie;

        return $this;
    }

    /**
     * Get libelleCategorie
     *
     * @return string
     */
    public function getLibelleCategorie()
    {
        return $this->libelleCategorie;
    }
}

