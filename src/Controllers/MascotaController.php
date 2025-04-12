<?php

namespace Controllers;

use Services\MascotaService;
use Models\ResponseModel;

require_once __DIR__ . '/../Services/MascotaService.php';
require_once __DIR__ . '/../Models/ResponseModel.php';

class MascotaController
{
    private $service;

    public function __construct()
    {
        $this->service = new MascotaService();
    }

    public function getAll()
    {
        $data = $this->service->getAll();
        echo ResponseModel::success($data);
    }

    public function getOne($id)
    {
        $mascota = $this->service->getOne($id);

        if ($mascota) {
            echo json_encode([
                'status' => 'OK',
                'codeStatus' => 200,
                'message' => $mascota
            ]);
        } else {
            http_response_code(404);
            echo json_encode([
                'status' => 'ERROR',
                'codeStatus' => 404,
                'message' => 'Mascota no encontrada'
            ]);
        }
    }


    public function create()
    {
        $body = json_decode(file_get_contents('php://input'), true);
        $data = $this->service->create($body);
        echo ResponseModel::success($data);
    }

    public function update($id)
    {
        $body = json_decode(file_get_contents('php://input'), true);
        $data = $this->service->update($id, $body);
        echo ResponseModel::success($data);
    }

    public function delete($id)
    {
        $this->service->delete($id);
        echo ResponseModel::success("Mascota eliminada");
    }
}
