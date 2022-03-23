<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class LuckyNumberController
{

    public function number(): Response {
        $number = mt_rand(0,100);

        return new Response( '<html lang="en"><body>Lucky number: '.$number.'</body></html>');
    }
}
