<?php

namespace App\Entity;

use App\Repository\DocumentCompanyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentCompanyRepository::class)
 */
class DocumentCompany
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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statue;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path_doc;

    /**
     * @ORM\Column(type="date")
     */
    private $date_insert;

    /**
     * @ORM\Column(type="integer")
     */
    private $support_id;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="documents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStatue(): ?string
    {
        return $this->statue;
    }

    public function setStatue(string $statue): self
    {
        $this->statue = $statue;

        return $this;
    }

    public function getPathDoc(): ?string
    {
        return $this->path_doc;
    }

    public function setPathDoc(string $path_doc): self
    {
        $this->path_doc = $path_doc;

        return $this;
    }

    public function getDateInsert(): ?\DateTimeInterface
    {
        return $this->date_insert;
    }

    public function setDateInsert(\DateTimeInterface $date_insert): self
    {
        $this->date_insert = $date_insert;

        return $this;
    }

    public function getSupportId(): ?int
    {
        return $this->support_id;
    }

    public function setSupportId(int $support_id): self
    {
        $this->support_id = $support_id;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }
}
