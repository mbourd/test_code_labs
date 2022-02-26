<?php

namespace App\Controller;

use App\Entity\Agency;
use App\Form\AgencyType;
use App\Repository\AgencyRepository;
use App\Services\AgencyService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AgencyController extends AbstractController
{
    public function index(AgencyService $agencyService): Response
    {
        return $this->render('agency/index.html.twig', [
            'agencies' => $agencyService->getAll(),
        ]);
    }

    public function new(Request $request, AgencyService $agencyService): Response
    {
        $agency = new Agency();
        $form = $this->createForm(AgencyType::class, $agency);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $agencyService->createAgency([
                "name" => $agency->getName(),
                "address" => $agency->getAddress(),
                "latitude" => $agency->getLatitude(),
                "longitude" => $agency->getLongitude(),
            ]);
            return $this->redirectToRoute('app_agency_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('agency/new.html.twig', [
            'agency' => $agency,
            'form' => $form,
        ]);
    }

    public function show(Agency $agency): Response
    {
        return $this->render('agency/show.html.twig', [
            'agency' => $agency,
        ]);
    }

    public function edit(int $id, Request $request, Agency $agency, AgencyService $agencyService): Response
    {
        $form = $this->createForm(AgencyType::class, $agency);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $agencyService->updateAgency($agency);
            return $this->redirectToRoute('app_agency_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('agency/edit.html.twig', [
            'agency' => $agency,
            'form' => $form,
        ]);
    }

    public function delete(Request $request, Agency $agency, AgencyRepository $agencyRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$agency->getId(), $request->request->get('_token'))) {
            $agencyRepository->remove($agency);
        }

        return $this->redirectToRoute('app_agency_index', [], Response::HTTP_SEE_OTHER);
    }
}
