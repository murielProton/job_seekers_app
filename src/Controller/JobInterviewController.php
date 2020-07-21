<?php

namespace App\Controller;

use App\Entity\JobInterview;
use App\Form\JobInterviewType;
use App\Repository\JobInterviewRepository;
use App\Repository\ApplicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/job/interview")
 */
class JobInterviewController extends AbstractController
{
    /**
     * @Route("/", name="job_interview_index", methods={"GET"})
     */
    public function index(JobInterviewRepository $jobInterviewRepository): Response
    {
        return $this->render('job_interview/index.html.twig', [
            'job_interviews' => $jobInterviewRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="job_interview_new", methods={"GET","POST"})
     */
    public function new(Request $request, ApplicationRepository $applicationRepository): Response
    {
        $jobInterview = new JobInterview();
        if($request->query->get('id') != null){
            $application = $applicationRepository->findOneBy(array('id' => $request->query->get('id')));
            $jobInterview->setApplication($application);
        }
        $form = $this->createForm(JobInterviewType::class, $jobInterview);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($jobInterview);
            $entityManager->flush();

            return $this->redirectToRoute('job_interview_index');
        }

        return $this->render('job_interview/new.html.twig', [
            'job_interview' => $jobInterview,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="job_interview_show", methods={"GET"})
     */
    public function show(JobInterview $jobInterview): Response
    {
        return $this->render('job_interview/show.html.twig', [
            'job_interview' => $jobInterview,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="job_interview_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, JobInterview $jobInterview): Response
    {
        $form = $this->createForm(JobInterviewType::class, $jobInterview);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('job_interview_index');
        }

        return $this->render('job_interview/edit.html.twig', [
            'job_interview' => $jobInterview,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="job_interview_delete", methods={"DELETE"})
     */
    public function delete(Request $request, JobInterview $jobInterview): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jobInterview->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($jobInterview);
            $entityManager->flush();
        }

        return $this->redirectToRoute('job_interview_index');
    }
}
