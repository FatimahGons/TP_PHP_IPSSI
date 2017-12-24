<?php

declare(strict_types=1);

namespace Cinema\Controller;

use Cinema\Repository\MeetingRepository;

final class FilmController
{
    /**
     * @var MeetingRepository
     */
    private $filmRepository;

    public function __construct(MeetingRepository $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

    public function indexAction() : string
    {
        $films = $this->filmRepository->fetchAll();

        ob_start();
        include __DIR__.'/../../../views/film.phtml';
        return ob_get_clean();
    }
}
