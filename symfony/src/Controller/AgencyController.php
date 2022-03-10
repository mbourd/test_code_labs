<?php

namespace App\Controller;

use App\Entity\Agency;
use App\Form\AgencyType;
use App\Repository\AgencyRepository;
use App\Services\AgencyService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class AgencyController extends AbstractController
{
    public function index(AgencyService $agencyService, TranslatorInterface $translator): Response
    {
        try {
            return $this->render('agency/index.html.twig', [
                'agencies' => $agencyService->getAll(),
            ]);
        } catch (\Throwable $e) {
            $this->addFlash('danger', $translator->trans("messages.errors.agency.getall"));
            return $this->redirectToRoute("app_index");
        }
    }

    public function new(Request $request, AgencyService $agencyService, TranslatorInterface $translator): Response
    {
        try {
            $agency = new Agency();
            $form = $this->createForm(AgencyType::class, $agency);
            $form->handleRequest($request);
            $errors = [];

            if ($form->isSubmitted()) {
                $errors = $agencyService->getFormErrors($form);

                if (count($errors) === 0) {
                    $agencyService->createAgency($form->getData());
                    $this->addFlash("success", $translator->trans("messages.success.agency.addNew", ["{{nameAgency}}" => $agency->getName()]));

                    return $this->redirectToRoute('app_agency_index', [], Response::HTTP_SEE_OTHER);
                }
            }

            return $this->renderForm('agency/new.html.twig', [
                'agency' => $agency,
                'form' => $form,
                'errors' => $errors
            ]);
        } catch (\Throwable $e) {
            $this->addFlash('danger', $translator->trans("messages.errors.agency.addNew"));
            return $this->redirectToRoute("admin");
        }
    }

    public function show(Agency $agency): Response
    {
        return $this->render('agency/show.html.twig', [
            'agency' => $agency,
        ]);
    }

    public function edit(Request $request, Agency $agency, AgencyService $agencyService, TranslatorInterface $translator): Response
    {
        try {
            $form = $this->createForm(AgencyType::class, $agency);
            $form->handleRequest($request);
            $errors = [];

            if ($form->isSubmitted()) {
                $errors = $agencyService->getFormErrors($form);

                if (count($errors) === 0) {
                    $agencyService->updateAgency($agency);
                    $this->addFlash("success", $translator->trans("messages.success.agency.edit", ["{{idAgency}}" => $agency->getId()]));

                    return $this->redirectToRoute('app_agency_index', [], Response::HTTP_SEE_OTHER);
                }
            }

            return $this->renderForm('agency/edit.html.twig', [
                'agency' => $agency,
                'form' => $form,
                'errors' => $errors
            ]);
        } catch (\Throwable $e) {
            $this->addFlash('danger', $translator->trans("messages.errors.agency.edit"));
            return $this->redirectToRoute("admin");
        }
    }

    public function delete(Request $request, Agency $agency, AgencyService $agencyService, TranslatorInterface $translator): Response
    {
        try {
            if ($this->isCsrfTokenValid('delete' . $agency->getId(), $request->request->get('_token'))) {
                $agencyService->deleteAgency($agency);
                $this->addFlash("success", $translator->trans("messages.success.agency.delete", ["{{nameAgency}}" => $agency->getName()]));
            }

            return $this->redirectToRoute('app_agency_index', [], Response::HTTP_SEE_OTHER);
        } catch (\Throwable $e) {
            $this->addFlash('danger', $translator->trans("messages.errors.agency.delete"));
            return $this->redirectToRoute("admin");
        }
    }
}
