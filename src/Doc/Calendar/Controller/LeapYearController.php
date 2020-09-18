<?php


namespace App\Calendar\Controller;


use App\Calendar\Entity\LeapYear;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{
    public function index(Request $request, $year): Response
    {
        $leapYear = new LeapYear();

        if ($leapYear->isLeapYear($year)) {
            return new Response('This is leap year !');
        }
        return new Response('Not a leap year');
    }
}