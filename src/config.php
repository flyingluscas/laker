<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Account Slug
    |--------------------------------------------------------------------------
    |
    | This value is the slug of your account or team on Bitbucket,
    | this value is used when the package needs to create new issues.
    */

    'account_slug' => null,

    /*
    |--------------------------------------------------------------------------
    | Repository Slug
    |--------------------------------------------------------------------------
    |
    | This value is the slug of your repository on Bitbucket,
    | this value is used when the package needs to create new issues.
    */

    'repository_slug' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    |
    | Here you may configure your access credentials from Bitbucket,
    | this credentials will be used to authenticate on Bitbucket when
    | creating new issues, this user also will be the one who create's them.
    */

    'auth' => [
        'username' => null,
        'password' => null,
    ],

];
