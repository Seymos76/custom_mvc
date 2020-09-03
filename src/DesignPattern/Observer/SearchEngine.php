<?php


namespace App\Observer;


use SplSubject;

class SearchEngine implements \SplObserver
{
    public function update(SplSubject $subject)
    {
        echo "La classe SearchEngine a été alertée. L'article "
            . $subject->getArticle()->getTitle()
            . " a été créé.<br>";
        echo "Votre article sera indexé";
    }

}