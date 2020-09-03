<?php


namespace App\Observer;


use SplObserver;

class ArticleManager implements \SplSubject
{
    private Article $article;

    protected \SplObjectStorage $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        /** @var SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function create(Article $article): void
    {
        $this->article = $article;
        $this->notify();
    }

    public function getArticle(): Article
    {
        return $this->article;
    }

}