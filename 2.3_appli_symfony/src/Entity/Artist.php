<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(['message' => 'Le nom ne peut etre vide !'])]
    #[Assert\Length(['min' => 3, 'minMessage' => 'Le nom doit contenir au minimum {{ limit }} caracteres !'])]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(['message' => 'Le prénom ne peut etre vide !'])]
    #[Assert\Length(['min' => 3, 'minMessage' => 'Le prénom doit contenir au minimum {{ limit }} caracteres !'])]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(['message' => 'Le nom d\'artiste ne peut etre vide !'])]
    #[Assert\Length(['min' => 3, 'minMessage' => 'Le nom d\'artiste doit contenir au minimum {{ limit }} caracteres !'])]
    private ?string $nickname = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotBlank(['message' => 'Le genre ne peut etre vide !'])]
    private ?string $gender = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateOfBirth = null;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Music::class)]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private Collection $musics;

    public function __construct()
    {
        $this->musics = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * @return Collection<int, Music>
     */
    public function getMusics(): Collection
    {
        return $this->musics;
    }

    public function addMusic(Music $music): self
    {
        if (!$this->musics->contains($music)) {
            $this->musics->add($music);
            $music->setAuthor($this);
        }

        return $this;
    }

    public function removeMusic(Music $music): self
    {
        if ($this->musics->removeElement($music)) {
            // set the owning side to null (unless already changed)
            if ($music->getAuthor() === $this) {
                $music->setAuthor(null);
            }
        }

        return $this;
    }
}
