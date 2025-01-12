<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    'login'=>[
        'title'=>'Log In',
        'description'=> 'Enter your credentials',
        'submit'=>'Submit'

    ],

    'register'=>[
        'title'=>'Registration',
        'description'=>'Create an account'
    ],
    'input'=>[
        'username'=>[
            'label'=>'Login',
            'placeholder'=>'Enter',

        ],
        'email'=>[
            'label'=>'Email',
            'placeholder'=>'Email'
        ],
        'full_name'=>[
            'label'=>'Full name',
            'placeholder'=>'First name, patronymic... '
        ],
        'phone'=>[
            'label'=>'Phone',
            'placeholder'=>'Phone number'
        ],
        'password'=>[
            'label'=>'Password',
            'placeholder'=>'Enter'
        ],

    ],

    'new_user'=>"Don't Have an account?",
    'create_user'=>'Sign Up.',
    'failed' => 'These credentials do not match our records.',
    'password' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'forgot_password'=>'Forgot password?'
];
