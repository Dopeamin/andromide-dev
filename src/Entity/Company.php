<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
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
    private $adress;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_postal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_siret;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_tva;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $juridic_form;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $representant_legal;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $zone;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $rib;

    /**
     * @ORM\OneToMany(targetEntity=DocumentCompany::class, mappedBy="company")
     */
    private $documents = null;

    /**
     * @ORM\OneToMany(targetEntity=Driver::class, mappedBy="company")
     */
    private $drivers = null;

    public function __construct()
    {
        $this->documents = new ArrayCollection();
        $this->drivers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(int $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getNumberSiret(): ?int
    {
        return $this->number_siret;
    }

    public function setNumberSiret(int $number_siret): self
    {
        $this->number_siret = $number_siret;

        return $this;
    }

    public function getNumberTva(): ?int
    {
        return $this->number_tva;
    }

    public function setNumberTva(int $number_tva): self
    {
        $this->number_tva = $number_tva;

        return $this;
    }

    public function getJuridicForm(): ?string
    {
        return $this->juridic_form;
    }

    public function setJuridicForm(string $juridic_form): self
    {
        $this->juridic_form = $juridic_form;

        return $this;
    }

    public function getRepresentantLegal(): ?string
    {
        return $this->representant_legal;
    }

    public function setRepresentantLegal(string $representant_legal): self
    {
        $this->representant_legal = $representant_legal;

        return $this;
    }

    public function getZone(): ?string
    {
        return $this->zone;
    }

    public function setZone(string $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getRib(): ?int
    {
        return $this->rib;
    }

    public function setRib(int $rib): self
    {
        $this->rib = $rib;

        return $this;
    }

    /**
     * @return Collection|DocumentCompany[]
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(DocumentCompany $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setCompany($this);
        }

        return $this;
    }

    public function removeDocument(DocumentCompany $document): self
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getCompany() === $this) {
                $document->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Driver[]
     */
    public function getDrivers(): Collection
    {
        return $this->drivers;
    }

    public function addDriver(Driver $driver): self
    {
        if (!$this->drivers->contains($driver)) {
            $this->drivers[] = $driver;
            $driver->setCompany($this);
        }

        return $this;
    }

    public function removeDriver(Driver $driver): self
    {
        if ($this->drivers->removeElement($driver)) {
            // set the owning side to null (unless already changed)
            if ($driver->getCompany() === $this) {
                $driver->setCompany(null);
            }
        }

        return $this;
    }
}
