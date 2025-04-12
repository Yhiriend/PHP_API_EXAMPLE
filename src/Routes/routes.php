<?php

use Controllers\MascotaController;

require_once __DIR__ . '/../Controllers/MascotaController.php';

header('Content-Type: application/json');

$controller = new MascotaController();
$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    ['GET',    '/mascotas',                 fn() => $controller->getAll()],
    ['GET',    '/mascotas/{id}',            fn($id) => $controller->getOne($id)],
    ['POST',   '/mascotas',                 fn() => $controller->create()],
    ['PUT',    '/mascotas/{id}',            fn($id) => $controller->update($id)],
    ['DELETE', '/mascotas/{id}',            fn($id) => $controller->delete($id)],
];

function matchRoute(string $method, string $uri, array $routes) {
    foreach ($routes as [$routeMethod, $routePattern, $handler]) {
        if ($method !== $routeMethod) continue;

        $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_-]+)', $routePattern);
        $pattern = '#^' . $pattern . '$#';

        if (preg_match($pattern, $uri, $matches)) {
            array_shift($matches); 
            return $handler(...$matches);
        }
    }

    http_response_code(404);
    echo json_encode([
        'status' => 'ERROR',
        'codeStatus' => 404,
        'message' => 'Ruta no encontrada'
    ]);
}

matchRoute($method, $uri, $routes);
