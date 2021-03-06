<?php

namespace WebMadaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="WebMadaBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="username", type="string", length=55)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=55)
     */
    private $password;
 /**
     * @var string
     *
     * @ORM\Column(name="statusCompte", type="string", length=55)
     */
    private $statusCompte;

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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set statusCompte
     *
     * @param string $statusCompte
     *
     * @return User
     */
    public function setStatusCompte($statusCompte)
    {
        $this->statusCompte = $statusCompte;

        return $this;
    }

    /**
     * Get statusCompte
     *
     * @return string
     */
    public function getStatusCompte()
    {
        return $this->statusCompte;
    }
}
