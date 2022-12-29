<?php

namespace App\Entity;

use App\Repository\MusicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MusicRepository::class)]
class Music
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(['message' => 'Le titre ne peut etre vide !'])]
    #[Assert\Length(['min' => 3, 'minMessage' => 'Le nom doit contenir au minimum {{ limit }} caracteres !'])]
    private ?string $title = null;

    #[ORM\Column]
    #[Assert\Type([
        'type' => 'integer',
        'message' => 'Vous devez saisir un nombre !',
    ])]
    #[Assert\Regex([
        'pattern' => '/[0-9]*/',
        'message' => 'Ne sont valident que les chiffres de 0 à 9',
    ])]
    private ?int $duration = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
//    #[Assert\Date]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
//    #[Assert\Date]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\ManyToMany(targetEntity: Category::class, mappedBy: 'musics')]
    private Collection $categories;

    #[ORM\ManyToOne(inversedBy: 'musics')]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?Artist $author = null;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

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

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDurationFormatted(): string
    {
        return floor($this->getDuration() / 60) . ":" . ((($this->getDuration() % 60) < 10) ? "0" . $this->getDuration() % 60 : $this->getDuration() % 60);
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->addMusic($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeMusic($this);
        }

        return $this;
    }

    public function getAuthor(): ?Artist
    {
        return $this->author;
    }

    public function setAuthor(?Artist $author): self
    {
        $this->author = $author;

        return $this;
    }

}
