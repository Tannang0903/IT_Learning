<?php
    $config['static_files'] = [
        'base' => [
            'css' => [
                'base',
                'grid',
                'header',
                // 'sidebar',
            ],
            'font' => [
                'fontawesome-free-6.1.2-web/css/all.css'
            ]
        ],
        'Auth/login' => [
            'css' => [
                'login'
            ],
            'js' => [
                'login'
            ]
        ],
        'Auth/register' => [
            'css' => [
                'login'
            ],
            'js' => [
                'register'
            ]
        ],
        'Auth/reset' => [
            'css' => [
                'login'
            ]
        ],
        'Home/index' => [
            'css' => [
                'home',
                'selector'
            ],
            'js' => [
                'https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous',
                'selector'
            ]
        ],
        'Problem/index' => [
            'css' => [
                'https://cdnjs.cloudflare.com/ajax/libs/CodeFlask.js/0.2.0/codeflask.min.css',
                'user_exercise',
            ],
            'js' => [
                'user_exercise'
            ]
        ],
        'Problem/list' => [
            'css' => [
                'user_problem',
                'selector'
            ],
            'js' => [
                'https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous',
                'selector'
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
                'admin_problem',
                'selector'
            ],
            'js' => [
                'https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous',
                'selector'
            ]
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
                'admin_problem',
                'selector' 
            ],
            'js' => [
                'https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous',
                'selector'
            ]
        ],
    ];
?>