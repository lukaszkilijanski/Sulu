<?php
declare(strict_types=1);

/**
 * File: PageModifiedSubscriber.php
 *
 * @author Łukasz Kilijański <lukasz.kilijanski@smartive.app>
 * @copyright Copyright (C) 2024 smartive.app (https://smartive.app)
 */


namespace App\EventSubscriber;

use App\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;
use Sulu\Component\DocumentManager\Event\PersistEvent;
use Sulu\Component\DocumentManager\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PageModifiedSubscriber implements EventSubscriberInterface
{

    public function __construct(private EntityManagerInterface $entityManager) {}

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
        $car = new Car();
        $car->setName($event->getDocument()->getTitle());
        $this->entityManager->persist($car);
        $this->entityManager->flush();
    }
}