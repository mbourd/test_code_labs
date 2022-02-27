<?php

namespace App\Services;

use App\Entity\Agency;
use App\Repository\AgencyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AgencyService
{
    private $entityManagerInterface;
    // private $validatorInterface;
    private $agencyRepository;

    public function __construct(
        EntityManagerInterface $entityManagerInterface,
        // ValidatorInterface $validatorInterface,
        AgencyRepository $agencyRepository
    ) {
        $this->entityManagerInterface = $entityManagerInterface;
        // $this->validatorInterface = $validatorInterface;
        $this->agencyRepository = $agencyRepository;
    }

    public function getById(int $id): Agency
    {
        return $this->agencyRepository->find($id);
    }

    public function getAll(): array
    {
        return $this->agencyRepository->findAll();
    }

    public function createAgency(array $data): Agency
    {
        $agency = new Agency();
        $agency->setName($data["name"]);
        $agency->setAddress($data["address"]);
        $agency->setLatitude($data["latitude"]);
        $agency->setLongitude($data["longitude"]);

        $this->entityManagerInterface->persist($agency);
        $this->entityManagerInterface->flush();

        return $agency;
    }

    public function updateAgency(Agency $agency)
    {
        $this->entityManagerInterface->persist($agency);
        $this->entityManagerInterface->flush();

        return $agency;
    }

    public function deleteAgency(Agency $agency)
    {
        $this->entityManagerInterface->remove($agency);
        $this->entityManagerInterface->flush();
    }

    public function getAllLikeName(string $name): array
    {
        return $this->agencyRepository->allLikeName($name);
    }

    public function getFormErrors(FormInterface $form)
    {
        $errors = [];

        if ($form->isSubmitted()) {
            if (!$form->isValid()) {
                foreach ($form->all() as $child) {
                    if (!$child->isValid()) {
                        $errors[$child->getName()] = (string) $child->getErrors();
                    }
                }
            }
        }

        return $errors;
    }
}
