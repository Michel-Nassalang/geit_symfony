<?php

namespace App\Controller;
use App\Repository\StructureRepository;
use App\Entity\Structure;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Types\Types;



class HelloWorldController extends AbstractController
{
    #[Route('/hello/world', name: 'app_hello_world')]
    
    public function index(): Response
    {
        $var= array('nom'=>'sidi','prenom'=>'diop','age'=> '12' );
        return $this->render('hello_world/index.html.twig', [
            'obj' => $var,
        ]);
    }

    #[Route('/structures', name: 'structures')]
    
    public function listeStructures(StructureRepository $structureRepository): Response
    {
        $var= $structureRepository->find(1);
       
        return $this->render('hello_world/index.html.twig', [
            'obj' => $var,
        ]);
    }
    #[Route('/new', name: 'nouvellestructure')]
    
    public function newStructures(StructureRepository $structureRepository): Response
    {

        $objstructure= new Structure();
        $objstructure->setNom("MORSOFT");
        $objstructure->setAdresse("MBOUR 3 THIES");
        $objstructure->setType("SARL");
        $objstructure->setTelephone("771582812");
        $date=new \Datetime("22-02-2023");
        $objstructure->setDateupdate($date);
        $datedelete= new \Datetime("25-06-2035");
        $objstructure->setDatedelete($datedelete);
        $structureRepository->save($objstructure,true);

        $var= $structureRepository->find(5);
       
        return $this->render('hello_world/index.html.twig', [
            'obj' => $var,
        ]);
    }
    #[Route('/update', name: 'updatestructure')]
    
    public function updateStructures(StructureRepository $structureRepository): Response
    {



        $var= $structureRepository->findOneBy(array('nom'=>'MORSOFT'));

      
        $var->setType("SA");
     
        //$date=(Doctrine\DBAL\Types\Types\Date)("2023-02-22");
        //$objstructure->setDatecreate($date);
        $structureRepository->save($var,true);
       
        return $this->render('hello_world/index.html.twig', [
            'obj' => $var,
        ]);
    }
    #[Route('/delete', name: 'deletestructure')]
    
    public function deleteStructures(StructureRepository $structureRepository): Response
    {



        $var= $structureRepository->findOneBy(array('nom'=>'MORSOFT'));

      

        $structureRepository->remove($var,true);
       
        return $this->render('hello_world/index.html.twig', [
            'obj' => $var,
        ]);
    }




}
