<?php
declare(strict_types=1);

namespace App\EventSubscriber;

use Sulu\Component\DocumentManager\Event\PersistEvent;
use Sulu\Component\DocumentManager\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PageModifiedSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        {
            return [
                Events::PERSIST => 'testEvent'
            ];
        }
    }

    public function testEvent(PersistEvent $event)
    {
        $document = $event->getDocument();
        /** @var \Sulu\Bundle\PageBundle\Document\PageDocument $document */
        $document = $event->getDocument();
        $locationData = $document->getStructure()->getProperty('locationtest')->getValue();
        $lat = $locationData['lat'];
        $long = $locationData['long'];
    }                                                      
}