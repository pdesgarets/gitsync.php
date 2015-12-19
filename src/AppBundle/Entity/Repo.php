<?php

namespace AppBundle\Entity;

/**
 * Repo
 */
class Repo
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $fromUrl;

    /**
     * @var string
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

