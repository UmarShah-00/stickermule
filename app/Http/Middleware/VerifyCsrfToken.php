<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
  
     protected $except = [
        '/login',
        '/logout',
        'property-delete/*', // Agar logout par bhi issue aa raha hai
         'news-delete/*',
         'rental-delete/*',
       
    ];
   
    
}
