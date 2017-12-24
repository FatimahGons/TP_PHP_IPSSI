<?php

declare(strict_types=1);

namespace Cinema\Factory;

use Cinema\Repository\MeetingRepository;
use PDO;
use Psr\Container\ContainerInterface;

final class FilmRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : MeetingRepository
    {
        $pdo = $container->get(PDO::class);

        return new MeetingRepository($pdo);
    }
}
