<?php

function getArrayDatabase():array
{
    return [
        'database' => [
            'local' => [
                'url' => 'mysql:host=localhost:3306;dbname=prak_project_bd',
                'username' => 'root',
                'password' => ''
            ]
        ]
    ];
}