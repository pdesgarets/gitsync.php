<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Repo
 *
 * @ORM\Table(name="repo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RepoRepository")
 */
class Repo
{
    /** 
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /** 
     * @var string
     *
     * @Assert\Regex("/[\w_.-]/")
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /** 
     * @var string
     *
     * @ORM\Column(name="from_url", type="string", length=255)
     */
    private $fromUrl;

    /** 
     * @var string
     *
     * @ORM\Column(name="to_url", type="string", length=255)
     */
    private $toUrl;

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
     * Set name
     *
     * @param string $name
     *
     * @return Repo
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
     * Set fromUrl
     *
     * @param string $fromUrl
     *
     * @return Repo
     */
    public function setFromUrl($fromUrl)
    {
        $this->fromUrl = $fromUrl;

        return $this;
    }

    /**
     * Get fromUrl
     *
     * @return string
     */
    public function getFromUrl()
    {
        return $this->fromUrl;
    }

    /**
     * Set toUrl
     *
     * @param string $toUrl
     *
     * @return Repo
     */
    public function setToUrl($toUrl)
    {
        $this->toUrl = $toUrl;

        return $this;
    }

    /**
     * Get toUrl
     *
     * @return string
     */
    public function getToUrl()
    {
        return $this->toUrl;
    }
}

