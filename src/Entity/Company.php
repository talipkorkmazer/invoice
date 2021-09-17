<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 */
class Company
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;


    /**
     * @return integer|null
     */
    public function getId(): ?int
    {
        return $this->id;

    }//end getId()


    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;

    }//end getName()


    /**
     * @param  string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;

    }//end setName()


    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;

    }//end getAddress()


    /**
     * @param string $address
     *
     * @return $this
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;

    }//end setAddress()


}//end class
