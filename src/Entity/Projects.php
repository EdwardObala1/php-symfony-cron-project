<?php

namespace App\Entity;

use App\Repository\ProjectsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectsRepository::class)
 */
class Projects
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $projectlink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $icons;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getProjectlink(): ?string
    {
        return $this->projectlink;
    }

    public function setProjectlink(?string $projectlink): self
    {
        $this->projectlink = $projectlink;

        return $this;
    }

    public function getIcons(): ?string
    {
        return $this->icons;
    }

    public function setIcons(?string $icons): self
    {
        $this->icons = $icons;

        return $this;
    }
}
