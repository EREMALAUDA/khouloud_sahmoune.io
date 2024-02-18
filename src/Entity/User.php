<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z]+$/',
        
    )]
    #[Assert\Length(
        min: 2,
        minMessage: "The name must be at least {{ limit }} characters long."
    )]
     
    private string $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Regex('/^[a-zA-Z]+$/')]
    #[Assert\Length(
        min: 3,
        minMessage: "The surname must be at least {{ limit }} characters long."
    )]
    private string $surname;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Regex(
        pattern:'/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        message: "The email value is not valid."
    )]
    private string $email;

    #[ORM\Column(type: 'string', length: 255)]
    private string $subject;

    #[ORM\Column(type: 'text')]
    private string $message;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName():string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getSurname():string
    {
        return $this->surname;
    }
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }
    public function getEmail():string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getSubject():string
    {
        return $this->subject;
    }
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }
    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
