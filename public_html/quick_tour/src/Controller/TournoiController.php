<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Evenement;
use App\Entity\Tournoi;

class TournoiController extends AbstractController
{
    /**
     * @Route("/tournoi", name="tournoi")
     */
    public function index(): Response
    {
        return $this->render('tournoi/index.html.twig', [
            'controller_name' => 'TournoiController',
        ]);
    }

    /**
     * @Route("tournoi/newEvt/{nom<[0-9a-zA-Z ]+>}", name="newevt")
     */

     public function newevt($nom): Response {
        $ev=new Evenement();
        $ev->setNom($nom);
        $entityManager =$this->getDoctrine()->getManager();
        $entityManager->persist($ev);
        $entityManager->flush();
        return new Response("Evenement '$nom' créé avec l'id: ".$ev->getId().'!');
     }

     /**
      * @Route("/tournoi/newTnoi/{evtid<[0-9]+>}/{nom<[0-9a-zA-Z ]+>}/{desc?}", name="newTnoi")
      */
      public function newTnoi($evtid, $nom, $desc): Response{
          $tnoi=new Tournoi();
          $tnoi->setNom($nom);
          $tnoi->setDescription($desc);
          $em =$this->getDoctrine()->getManager();
          $evt = $em->find("App\Entity\Evenement",(int)$evtid);
          if($evt === null){
              return new Response("L'événement $evtid n'existe pas ! Le tournoi n'a pas été créé!");
          }else{
              $tnoi->setEv($evt);
              $em->persist($tnoi);
              $em->flush();
              return new Response ("le tournoi {$tnoi->getNom()} a été enregistré dans l'événement {$evt->getNom()} !");
          }
      }
      /**
       * @Route("/tournoi/tournois", name="display_tournoi")
       * liste des evenements et des tournois
       */

       public function tournois(): Response{
           $evts = $this->getDoctrine()->getManager()->getRepository("App\Entity\Evenement")->findAll();
           return $this->render ('tournoi/tournois.html.twig', ['evts'=>$evts,]);
       }
}
