<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Dashboard
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Inicio', route('dashboard'), ['icon'=>'fas fa-home']);
});

// Dashboard > Obras
Breadcrumbs::for('obrasG', function ($trail) {
    $trail->parent('home');
    $trail->push('Obras', route('obra.index'), ['icon' => 'fas fa-server']);
});

// Dashboard > Obra > crear
Breadcrumbs::for('obra/create', function ($trail) {
    $trail->parent('obrasG');
    $trail->push('Crear Obra', route('obra.create'), ['icon' => 'fas fa-marker']);
});

// Dashboard > Obra Especifica
Breadcrumbs::for('obra', function ($trail, $obra) {
    $trail->parent('home');
    $trail->push($obra->NombreObra, route('obraB', $obra->id),['icon' => 'fas fa-server'] );
});

// Dashboard > Obra > Edit
Breadcrumbs::for('obra/edit', function ($trail, $obra) {
    $trail->parent('obra', $obra);
    $trail->push('Editar Obra', route('obra.edit', $obra), ['icon' => 'far fa-edit']);
});

// Dashboard > Obra > Calendar
Breadcrumbs::for('calendario', function ($trail, $obra) {
    $trail->parent('obra', $obra);
    $trail->push('Cronograma', route('calendar.index', $obra), ['icon' => 'far fa-calendar-check']);
});


// Dashboard > Novedades
Breadcrumbs::for('NovedadesBC', function ($trail) {
    $trail->parent('home');
    $trail->push('Novedades', route('novedad'), ['icon' => 'fas fa-envelope-open']);
});

// Dashboard > Materiales
Breadcrumbs::for('Materiales', function ($trail) {
    $trail->parent('home');
    $trail->push('Materiales', route('material'), ['icon' => 'fas fa-cubes']);
});

// Dashboard > Empleados
Breadcrumbs::for('Empleados', function ($trail) {
    $trail->parent('home');
    $trail->push('Empleados', route('empleado'), ['icon' => 'fas fa-user-tie']);
});

// Dashboard > Planilla
Breadcrumbs::for('Planillas', function ($trail) {
    $trail->parent('home');
    $trail->push('Planillas de Afiliación', route('planilla'), ['icon' => 'fas fa-clipboard']);
});

// Dashboard > Clientes
Breadcrumbs::for('Clientes', function ($trail) {
    $trail->parent('home');
    $trail->push('Clientes', route('clientes'), ['icon' => 'fas fa-users']);
});



// Dashboard > Disenos
Breadcrumbs::for('Disenos', function ($trail) {
    $trail->parent('home');
    $trail->push('Diseños', route('diseno'), ['icon' => 'fas fa-file-signature']);
});

// Dashboard > Secciones
Breadcrumbs::for('Secciones', function ($trail) {
    $trail->parent('home');
    $trail->push('Secciones de diseño', route('secciones'), ['icon' => 'fas fa-layer-group']);
});


