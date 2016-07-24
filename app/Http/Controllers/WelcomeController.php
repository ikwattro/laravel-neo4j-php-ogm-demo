<?php

namespace App\Http\Controllers;
use GraphAware\Neo4j\Client\Client;
use GraphAware\Neo4j\OGM\EntityManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\Movie;
use App\Model\Person;

class WelcomeController extends BaseController
{
    /**
     * @var \GraphAware\Neo4j\OGM\EntityManager
     */
    protected $em;

    /**
     * @var \GraphAware\Neo4j\Client\Client
     */
    protected $client;

    public function __construct(EntityManager $em, Client $client)
    {
        $this->em = $em;
        $this->client = $client;
    }

    public function welcome()
    {
        $movies = $this->em->getRepository(Movie::class)->findAll();
        return view('movies', array('movies' => $movies));
    }

    public function movieInfo($id)
    {
        $movie = $this->em->getRepository(Movie::class)->findOneById((int) $id);

        return view('movie', array('movie' => $movie));
    }

    public function actorInfo($id)
    {
        $actor = $this->em->getRepository(Person::class)->findOneById((int) $id);

        return view('actor', array('actor' => $actor));
    }

    public function editActor($id)
    {
        $actor = $this->em->getRepository(Person::class)->findOneById((int) $id);

        return view('actor_edit', array('actor' => $actor));
    }

    public function updateActor(Request $request, $id)
    {

        return view('welcome');
    }

    public function actorsList()
    {
        $s = microtime(true);
        $actors = $this->em->getRepository(Person::class)->findAll();
        echo microtime(true) - $s;

        return view('actors', array('actors' => $actors));
    }
}