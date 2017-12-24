<?php

declare(strict_types=1);

namespace Cinema\Repository;

use Cinema\Collection\MeetingCollection;
use Cinema\Entity\Meeting;
use Cinema\Exception\FilmNotFoundException;
use PDO;

final class FilmRepository
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAll() : MeetingCollection
    {
        $result = $this->pdo->query('SELECT id, title FROM films');
        $films = [];
        while ($film = $result->fetch()) {
            $films[] = new Meeting($film['title']);
        }
        return new MeetingCollection(...$films);
    }

    public function get(string $name) : Meeting
    {
        $statement = $this->pdo->prepare('SELECT id, title FROM films WHERE title = :name');
        $statement->execute([':name' => $name]);
        $film = $statement->fetch();
        if (!$film) {
            throw new FilmNotFoundException();
        }
        return new Meeting($film['title']);
    }
}
