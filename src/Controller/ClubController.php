<?php

namespace App\Controller;

use App\Repository\BureauRepository;
use App\Repository\ProjetRepository;
use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{

    /**
     * @var BureauRepository
     */
    private BureauRepository $bureauRepository;

    /**
     * @var ProjetRepository
     */
    private ProjetRepository $projetRepository;



    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(BureauRepository $bureauRepository,
                                ProjetRepository $projetRepository,
                                EntityManagerInterface $em)
    {
        $this->bureauRepository = $bureauRepository;
        $this->projetRepository = $projetRepository;
        $this->em = $em;
    }


    #[Route('/club', name: 'club')]
    public function index(BureauRepository $bureauRepository, ProjetRepository $projetRepository): Response
    {
        $membres = $bureauRepository->findAll();
        $projets = $projetRepository->findAll();
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
            'membres' => $membres,
            'projets' =>$projets
        ]);
    }
}
