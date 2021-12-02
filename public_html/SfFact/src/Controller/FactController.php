<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactController extends AbstractController
{
    /**
     * @Route("/fact/calc/{n}", name="factCalc")
     */
    public function calc($n)
    {

        if ($n !== null) {
            $rsl = factorielle($n);
            return new Response("$rsl");
        }
    }
    /**
     * @Route("/fact/n", name="factN")
     */
    public function factN($n = 5)
    {
        if ($n !== null) {
            return new Response($n);
        }
    }
    /**
     * @Route("/fact", name="fact")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/FactController.php',
        ]);
    }

    /**
     * @Route("/combi/{n}/{p}", name="combiP")
     */

    public function calcPascal($n, $p)
    {
        if ($n !== null & $p !== null) {
            $rsl = pascal($n, $p);
            return new Response("$rsl");
        }
    }


    /**
     * @Route("/twig_form", name="form")
     */
    public function twig_form(): Response
    {
        return $this->render("base.html.twig");
    }
}
function factorielle($n)
{
    $res = 1;
    for ($n; $n > 0; $n--) {
        $res = $n * $res;
    }
    return ($res);
}

function pascal($n, $p)
{
    $rsl = factorielle($n) / (factorielle($p) * factorielle($n - $p));
    return ($rsl);
}
