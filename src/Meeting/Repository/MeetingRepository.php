<?php

declare(strict_types=1);

namespace Meeting\Repository;

use Meeting\Collection\MeetingCollection;
use Meeting\Entity\Community;
use Meeting\Entity\Meeting;
use Cinema\Exception\FilmNotFoundException;
use PDO;

final class MeetingRepository
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
        $result = $this->pdo->query('SELECT meetings.id, title, description, date_start, date_end, community_id, name FROM meetings JOIN communities on meetings.community_id = communities.id');
        $meetings = [];
        while ($meeting = $result->fetch()) {
            $meetings[] = new Meeting(intval($meeting['id']), $meeting['title'], $meeting['description'], $meeting['date_start'], $meeting['date_end'],
                new Community(intval($meeting['community_id']), $meeting['name']));
        }
        return new MeetingCollection(...$meetings);
    }

//    public function get(string $name) : Meeting
//    {
//        $statement = $this->pdo->prepare('SELECT id, title FROM films WHERE title = :name');
//        $statement->execute([':name' => $name]);
//        $film = $statement->fetch();
//        if (!$film) {
//            throw new FilmNotFoundException();
//        }
//        return new Meeting($film['title']);
//    }
}
