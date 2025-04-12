<?php

namespace Repositories;

use Models\Mascota;

require_once __DIR__ . '/../Models/Mascota.php';

class MascotaRepository
{
    private $file = __DIR__ . '/../../mockdata/mascotas.json';

    public function getAll()
    {
        return json_decode(file_get_contents($this->file), true);
    }

    public function findById($id) {
        $mascotas = $this->getAll();
        foreach ($mascotas as $m) {
            if (is_array($m)) {
                if ($m['id'] == $id) {
                    return $m;
                }
            } elseif (is_object($m)) {
                if ($m->id == $id) {
                    return $m;
                }
            }
        }
        return null;
    }
    

    public function create($data)
    {
        $data['id'] = uniqid();
        $mascotas = $this->getAll();
        $mascotas[] = $data;
        file_put_contents($this->file, json_encode($mascotas, JSON_PRETTY_PRINT));
        return $data;
    }

    public function update($id, $data)
    {
        $mascotas = $this->getAll();
        foreach ($mascotas as &$m) {
            if ($m['id'] === $id) {
                $m = array_merge($m, $data);
                break;
            }
        }
        file_put_contents($this->file, json_encode($mascotas, JSON_PRETTY_PRINT));
        return $data;
    }

    public function delete($id)
    {
        $mascotas = $this->getAll();
        $mascotas = array_filter($mascotas, fn($m) => $m['id'] !== $id);
        file_put_contents($this->file, json_encode(array_values($mascotas), JSON_PRETTY_PRINT));
    }
}
