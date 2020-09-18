<?php


namespace App\Doc\DesignPattern\Observer;


use SplSubject;

class Notify implements \SplObserver
{
    public function update(SplSubject $subject)
    {
        echo "La classe Notify a été alertée. L'article "
            . $subject->getArticle()->getTitle()
            . " a été créé.<br>";
        echo "Un email sera envoyé à votre liste d'abonnés";
        // send email
    }

}
