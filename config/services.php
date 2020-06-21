<?php

return [

    'msg' => [
        'enable' => env('MSG_ENABLE', true),
        'key' => '',
        'code' => '',
    ],

    'fcm' => [
        'enable' => env('FCM_ENABLE', true),
        'key' => [
            'users' => '', // SERVER KEY from Firebase
        ],
    ],

    'instamojo' => [
        'enable' => env('INSTA_ENABLE', true),
        'url' => env('INSTA_URL'),
        'key' => env('INSTA_KEY'),
        'token' => env('INSTA_TOKEN'),
        'salt' => env('INSTA_SALT'),
    ],


];
