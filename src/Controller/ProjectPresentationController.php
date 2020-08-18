<?php

namespace App\Controller;

use App\Entity\ProjectPresentation;
use App\Form\ProjectPresentationType;
use App\Repository\ProjectPresentationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/project/presentation")
 */
class ProjectPresentationController extends AbstractController
{
    /**
     * @Route("/tableOfContent", name="project_presentation_table_of_content", methods={"GET"})
     */
    public function tableOfContent(): Response
    {
        return $this->render('project_presentation/projectPresentationTOC.html.twig');
    }

    /**
     * @Route("/objectifs", name="project_presentation_objectifs", methods={"GET"})
     */
    public function objectifsOfTheProject(): Response
    {
        return $this->render('project_presentation/objectifs.html.twig');
    }

    /**
     * @Route("/needs", name="project_presentation_needs", methods={"GET"})
     */
    public function needs(): Response
    {
        return $this->render('project_presentation/needs.html.twig');
    }

    /**
     * @Route("/features", name="project_presentation_features", methods={"GET"})
     */
    public function features(): Response
    {
        return $this->render('project_presentation/features.html.twig');
    }

    /**
     * @Route("/questionnaire", name="project_presentation_questionnaire", methods={"GET"})
     */
    public function questionnaire(): Response
    {
        return $this->render('project_presentation/questionnaire.html.twig');
    }
}
