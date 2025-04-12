<?php

namespace Services;

use Repositories\MascotaRepository;

require_once __DIR__ . '/../Repositories/MascotaRepository.php';

class MascotaService
{
    private $repo;

    public function __construct()
    {
        $this->repo = new MascotaRepository();
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }

    public function getOne($id) {
        return $this->repo->findById($id);
    }

    public function create($data)
    {
        return $this->repo->create($data);
    }

    public function update($id, $data)
    {
        return $this->repo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repo->delete($id);
    }
}
