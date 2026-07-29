<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin panel location
    |--------------------------------------------------------------------------
    |
    | Set ADMIN_DOMAIN to serve the panel from its own subdomain, e.g.
    |
    |     ADMIN_DOMAIN=admin.saurashtranagrik.com
    |
    | The panel then lives at the root of that host (https://admin.example.com/).
    | Point the subdomain's document root at the same public/ directory.
    |
    | Leave it empty and the panel is served at /admin on the main domain
    | instead. Exactly one of the two is registered, so route names never
    | collide and route() always generates the correct URL.
    |
    */

    'domain' => env('ADMIN_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Upload destination
    |--------------------------------------------------------------------------
    |
    | Uploads are written under public/ so they are served directly by the web
    | server, exactly like the original theme assets. Stored paths are relative
    | to public/, which is what asset() expects.
    |
    */

    'upload_dir' => 'uploads',

];
