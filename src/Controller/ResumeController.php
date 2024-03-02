<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResumeController extends AbstractController
{
    #[Route('/about-me', name: 'resume')]
    public function index(): Response
    {
        return $this->render('resume/index.html.twig', [
            'controller_name' => 'ResumeController',
        ]);
    }

    /**
     * @Route("/download-pdf", name="download_pdf")
     */
    public function downloadPdf(): Response
    {
        $pdfPath = $this->getParameter('kernel.project_dir') . '/public/cv/SAHMOUNE_KHOULOUD.pdf';

        // Return the PDF file as a binary response
        return new BinaryFileResponse($pdfPath);
    }
}
