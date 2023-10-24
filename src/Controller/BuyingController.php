<?php

namespace App\Controller;

use App\Entity\Buying;
use App\Repository\AlbumRepository;
use App\Repository\BuyingRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/buy')]
class BuyingController extends AbstractController
{
    #[Route('/', name: 'app_buying_index', methods: ['GET'])]
    public function index(BuyingRepository $buyingRepository): Response
    {
        return $this->render('buying/index.html.twig', [
            'buyings' => $buyingRepository->findAll()
        ]);
    }

    #[Route('/{id}', name: 'app_buying', methods: ['GET'])]
    public function buying(Int $id, AlbumRepository $albumRepository, EntityManagerInterface $entityManager): Response
    {
        $buying = new Buying();
        $user = $this->getUser();

        $buying->setUser($user);
        $buying->setAlbum($albumRepository->find($id));
        $buying->setCreatedAt(new DateTimeImmutable());

        $entityManager->persist($buying);
        $entityManager->flush();

        return $this->redirectToRoute('app_album_index');
    }
}
