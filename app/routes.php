<?php


$controllers = array(
    'Menu' => ['index'],
    'Cliente'=>['index'],
    'Proyecto'=>["registro","listado","administracion","actualizar","editar"],
    'Usuario'=>["administracion","registrar","guardar","editar","actualizar", "eliminar","eliminarusuario"],
    'Participantes'=>["administracion","editar","actualizar"]
);

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('Menu', 'index');
    }
} else {
    call('Menu', 'index');
}

function call($controller, $action)
{

    require_once('Controllers/' . $controller . 'Controller.php');

    switch ($controller) {
        case 'Menu':
            $controller = new MenuController();
            break;
        case 'Cliente':
            $controller = new ClienteController();
            break;
        case 'Proyecto':
            $controller = new ProyectoController();
            break;
        case 'Usuario':
            $controller = new UsuarioController();
            break; 
        case 'Participantes':
            $controller = new ParticipantesController();
            break;       
        default:
            # código...
            break;
    }

    $controller->{$action}();
}

?>