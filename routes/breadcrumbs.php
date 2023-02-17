<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::macro('resource', function (string $name, string $title) {
    Breadcrumbs::for("{$name}.index", function (BreadcrumbTrail $trail) use ($name, $title) {
        $trail->parent('home');
        $trail->push($title, route("{$name}.index"));
    });

    Breadcrumbs::for("{$name}.create", function (BreadcrumbTrail $trail) use ($name) {
        $trail->parent("{$name}.index");
        $trail->push('Cadastrar', route("{$name}.create"));
    });

    Breadcrumbs::for("{$name}.show", function (BreadcrumbTrail $trail, string|int $id, string $title) use ($name) {
        $trail->parent("{$name}.index");
        $trail->push($title, route("{$name}.show", $id));
    });

    Breadcrumbs::for("{$name}.edit", function (BreadcrumbTrail $trail, string|int $id, string|int $title) use ($name) {
        if (Route::has("{$name}.show")) {
            $trail->parent("{$name}.show", $id, $title);
        } else {
            $trail->parent('home');
        }
        $trail->push('Editar', route("{$name}.edit", $id));
    });
});

Breadcrumbs::resource('admin.plans', 'Planos');