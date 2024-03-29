<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvoiceRepository::class)
 */
class Invoice
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
    private $invoice_no;

    /**
     * @ORM\Column(type="date")
     */
    private $invoice_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $service;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $quantity;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2)
     */
    private $unit_price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $currency;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ettn;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2, nullable=true)
     */
    private $total;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="invoices")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="invoices")
     */
    private $company;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoiceNo()
    {
        return $this->invoice_no;
    }

    public function setInvoiceNo($invoice_no): self
    {
        $this->invoice_no = $invoice_no;

        return $this;
    }

    public function getInvoiceDate()
    {
        return $this->invoice_date;
    }

    /**
     * Set Invoice Date
     *
     * @param \DateTime $invoice_date
     *
     * @return Invoice
     */
    public function setInvoiceDate($invoice_date): self
    {
        $this->invoice_date = $invoice_date;

        return $this;
    }

    public function getService()
    {
        return $this->service;
    }

    public function setService($service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    public function setUnitPrice($unit_price): self
    {
        $this->unit_price = $unit_price;

        return $this;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getEttn()
    {
        return $this->ettn;
    }

    public function setEttn($ettn): void
    {
        $this->ettn = $ettn;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total): void
    {
        $this->total = $total;
    }
}
