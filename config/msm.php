<?php

return [

    /*
     * Username provided by MSM.
     */

    'username' => env('MSM_USERNAME'),

    /*
     * Password provided by MSM.
     */

    'password' => env('MSM_PASSWORD'),

    /*
     * Sender name provided by MSM.
     */

    'sender' => env('MSM_SENDER'),

    /*
     * Enable or disable database SMS logging mode.
     */

    'logging' => env('MSM_LOGGING', false),
];
