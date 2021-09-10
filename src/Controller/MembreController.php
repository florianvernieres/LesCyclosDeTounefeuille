<?php

namespace App\Controller;

use App\Repository\MembreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MembreController extends AbstractController
{

    /**
     * @var MembreRepository
     */
    private MembreRepository $membreRepository;

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;
    /**
     * MembreController constructor.
     * @param MembreRepository $membreRepository
     * @param EntityManagerInterface $em
     */
    public function __construct(MembreRepository $membreRepository, EntityManagerInterface $em)
    {
        $this->membreRepository = $membreRepository;
        $this->em = $em;
    }

    /**
     * @param MembreRepository $membreRepository
     * @return Response
     */
    #[Route('/membre', name: 'membre')]
    public function index(MembreRepository $membreRepository): Response
    {
        $membres = $membreRepository->findAll();
        return $this->render('membre/index.html.twig', [
            'controller_name' => 'MembreController',
            'membres' => $membres
        ]);
    }
}
