<?php

namespace App\Controller;

use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgrammeController extends AbstractController
{
    /**
     * @var SortieRepository
     */
    private SortieRepository $sortierepository;

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(SortieRepository $sortieRepository, EntityManagerInterface $em)
    {
        $this->sortierepository = $sortieRepository;
        $this->em = $em;
    }

    #[Route('/programme', name: 'programme')]
    public function index(SortieRepository $sortieRepository): Response
    {
        $sorties = $sortieRepository->findAll();
        return $this->render('programme/index.html.twig', [
            'controller_name' => 'ProgrammeController',
            'sorties' => $sorties
        ]);
    }
}
