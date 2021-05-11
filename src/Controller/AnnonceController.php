<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    /**
     * @var AnnonceRepository $repository
     */
     private AnnonceRepository $repository;

    /**
     * @var EntityManagerInterface $em
     */
     private $em;

    /**
     * AnnonceController constructor.
     * @param AnnonceRepository $repository
     * @param EntityManagerInterface $em
     */
    public function __construct(AnnonceRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;

    }

    /**
     * @param AnnonceRepository $repository
     * @return Response
     */
    #[Route('/annonce', name: 'annonce')]
    public function index(AnnonceRepository $repository): Response
    {
        $annonces = $repository->findlatest();
        return $this->render('annonce/index.html.twig', [
            'controller_name' => 'AnnonceController',
            'annonces' => $annonces
        ]);
    }

    /**
     * @param Annonce $annonce
     * @return Response
     */
    #[Route('/annonce/{id}', name: 'annonce.show' )]
    public function show(Annonce $annonce): Response
    {
        return $this->render('annonce/show.html.twig', [
            'annonce' => $annonce,
            'annonces' => 'annonces'
        ]);
    }
}
