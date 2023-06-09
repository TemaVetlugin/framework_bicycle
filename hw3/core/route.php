<?php 

return [
    [
        'check'=>'/^add$/',
        "controller"=>'articles/add'
    ],
    [
        'check'=>'/^$/',
        "controller"=>'articles/index'
    ],
    [
        'check'=>'/^article\/([1-9]+\d*)$/',
        "controller"=>'articles/article',
        'params'=>['id'=>'1']
    ],
    [
        'check'=>'/^cat\/([1-9]+\d*)$/',
        "controller"=>'cats/cat',
        'params'=>['cat_id'=>'1']
    ],
    [
        'check'=>'/^edit\/([1-9]+\d*)$/',
        "controller"=>'articles/edit',
        'params'=>['id'=>'1']
    ],
    [
        'check'=>'/^delete\/([1-9]+\d*)$/',
        "controller"=>'articles/delete',
        'params'=>['id'=>'1']
    ],
    [
        'check'=>'/^cat_add$/',
        "controller"=>'cats/cat_add'
    ],
    [
        'check'=>'/^catEdit\/([1-9]+\d*)$/',
        "controller"=>'cats/catEdit',
        'params'=>['cat_id'=>'1']
    ],
    [
        'check'=>'/^catDelete\/([1-9]+\d*)$/',
        "controller"=>'cats/catDelete',
        'params'=>['cat_id'=>'1']
    ],
    [
        'check'=>'/^reg$/',
        "controller"=>'users/reg'
    ],
    [
        'check'=>'/^login$/',
        "controller"=>'users/login'
    ],
    [
        'check'=>'/^logout$/',
        "controller"=>'users/logout'
    ]
];