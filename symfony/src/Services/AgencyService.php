<?php

namespace App\Services;

use App\Entity\Agency;
use App\Repository\AgencyRepository;
use Doctrine\ORM\EntityManagerInterface;

class AgencyService
{
    private $entityManagerInterface;
    private $agencyRepository;

    public function __construct(EntityManagerInterface $entityManagerInterface, AgencyRepository $agencyRepository)
    {
        $this->entityManagerInterface = $entityManagerInterface;
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

    public function updateAgency(Agency $agnecy)
    {

    }

    public function getAllLikeName(string $name): array
    {
        return $this->agencyRepository->allLikeName($name);
    }
}
