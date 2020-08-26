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
    /**
     * @Route("/answerTQ001", name="project_presentation_answerTQ001", methods={"GET"})
     */
    public function answerTQ001(): Response
    {
        return $this->render('project_presentation/answerTQ001.html.twig');
    }
    /**
     * @Route("/answerTQ002", name="project_presentation_answerTQ002", methods={"GET"})
     */
    public function answerTQ002(): Response
    {
        return $this->render('project_presentation/answerTQ002.html.twig');
    }
    /**
     * @Route("/answerTQ003", name="project_presentation_answerTQ003", methods={"GET"})
     */
    public function answerTQ003(): Response
    {
        return $this->render('project_presentation/answerTQ003.html.twig');
    }
    /**
     * @Route("/answerTQ004", name="project_presentation_answerTQ004", methods={"GET"})
     */
    public function answerTQ004(): Response
    {
        return $this->render('project_presentation/answerTQ004.html.twig');
    }

        /**
     * @Route("/technology", name="project_presentation_technology", methods={"GET"})
     */
    public function technology(): Response
    {
        return $this->render('project_presentation/technology.html.twig');
    }
    /**
     * @Route("/symfony", name="project_presentation_symfony", methods={"GET"})
     */
    public function symfony(): Response
    {
        return $this->render('project_presentation/symfony.html.twig');
    }
}
