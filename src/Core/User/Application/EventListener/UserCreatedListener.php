<?php

namespace App\Core\User\Application\EventListener;

use App\Common\Mailer\MailerInterface;
use App\Core\User\Domain\Event\UserCreatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserCreatedListener implements EventSubscriberInterface
{
    public function __construct(private readonly MailerInterface $mailer) {}

    public function onUserCreated(UserCreatedEvent $event): void
    {
        $email = $event->getUserEmail();
        $subject = 'Zarejestrowano konto w systemie';
        $message = 'Zarejestrowano konto w systemie. Aktywacja konta trwa do 24h';

        $this->mailer->send($email, $subject, $message);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            UserCreatedEvent::class => 'onUserCreated'
        ];
    }
}
