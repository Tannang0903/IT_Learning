<?php
    $config['static_files'] = [
        'base' => [
            'css' => [
                'base',
                'grid',
                'header'
            ],
            'font' => [
                'fontawesome-free-6.1.2-web/css/all.css'
            ]
        ],
        'Home/index' => [
            'css' => [
                'home'
            ],
            'js' => [
                'home'
            ]
        ],
        'Auth/login' => [
            'css' => [
                'login'
            ]
        ],
        'Auth/register' => [
            'css' => [
                'login'
            ]
        ],
        'Auth/reset' => [
            'css' => [
                'login'
            ]
        ],
        'Problem/index' => [
            'css' => [
                'user_exercise'
            ],
            'js' => [
                'node_modules/jquery/dist/jquery.min',
                'node_modules/monaco-editor/min/vs/loader',
                'node_modules/monaco-editor/min/vs/editor/editor.main.nls',
                'node_modules/monaco-editor/min/vs/editor/editor.main',
                'user_exercise'
            ]
        ],
        'Problem/list' => [
            'css' => [
                'user_problem'
            ]
        ], 
        'Profile/index' => [
            'css' => [
                'user_detail'
            ]
        ], 

        //Admin
        'Admin/Home/index' => [
            'css' => [
                
            ],
        ],
        'Admin/Problem/index' => [
            'css' => [
                'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous',
                'admin_problem'
            ],
        ],
        'Admin/Problem/insert' => [
            'css' => [
                'admin_problem-insert'
            ],
            'js' => [
                'ckeditor/ckeditor',
                'ckfinder/ckfinder',
                'admin_problem-insert'
            ]
        ],
        'Admin/Problem/summitted' => [
            'css' => [
                'admin_problem-summitted'   
            ],
        ],
    ];
?>