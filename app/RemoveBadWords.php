<?php

namespace App;

use Closure;

class RemoveBadWords implements Pipe
{
    public function handle($content, Closure $next)
    {
        // Here code logic for removing Bar words
        return  $next($content);
    }
}