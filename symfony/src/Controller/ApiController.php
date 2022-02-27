<?php

namespace App\Controller;

use App\Form\AgencyType;
use App\Services\AgencyService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @Route("/api/agencies")
 */
class ApiController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/{id}")
     *
     * @param integer $id
     * @param \App\Services\AgencyService $agencyService
     *
     * @return void
     */
    public function getAgency(int $id, AgencyService $agencyService, TranslatorInterface $translator)
    {
        $agency = $agencyService->getById($id);

        if (is_null($agency)) {
            return $this->handleView(View::create($translator->trans("message.rest.agency.notfound"), Response::HTTP_NOT_FOUND));
        }

        return $this->handleView(View::create($agency, Response::HTTP_OK));
    }

    /**
     * @Rest\Post()
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \App\Services\AgencyService $agencyService
     *
     * @return void
     */
    public function postAgency(Request $request, AgencyService $agencyService, TranslatorInterface $translator)
    {
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(AgencyType::class, null, ['method' => 'POST', 'csrf_protection' => false]);
        $form->submit($data, true);
        $errors = $agencyService->getFormErrors($form);

        if (count($errors) > 0) {
            return $this->handleView(View::create($translator->trans("message.rest.agency.invaliddata"), Response::HTTP_BAD_REQUEST));
        }

        $craetedAgency = $agencyService->createAgency($data);

        return $this->handleView(View::create($craetedAgency, Response::HTTP_CREATED));
    }

    /**
     * @Rest\Get()
     * @Rest\QueryParam(name="name", default="", nullable=true)
     */
    public function getAgencies(ParamFetcher $paramFetcher, AgencyService $agencyService)
    {
        $name = $paramFetcher->get("name");

        if ($name === "") {
            $listAgencies = $agencyService->getAll();
        } else {
            $listAgencies = $agencyService->getAllLikeName($name);
        }

        return $this->handleView(View::create($listAgencies, Response::HTTP_OK));
    }
}
