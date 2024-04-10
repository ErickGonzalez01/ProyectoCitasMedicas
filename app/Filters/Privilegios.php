<?php

namespace CitasMedicas\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

use CitasMedicas\Roll\RolesOfUsuario;

class Privilegios implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        //
        $usuario = session()->get("usuario");

        $response = service('response');

        $roles = new RolesOfUsuario();

        $ruta = $request->getUri()->getRoutePath();

        $views = view("no_autorizado");

        $views_main = view("main", [
            "contenido" => $views,
            "usuario" => $usuario["nombre"]." ".$usuario["apellido"]
        ]);
        
        $acceso = $roles->tieneAcceso($ruta);

        $response->setBody($views_main);

        if (!$acceso) {
            return $response;
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
