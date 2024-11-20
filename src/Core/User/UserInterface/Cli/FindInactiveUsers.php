<?php

namespace App\Core\User\UserInterface\Cli;

use App\Common\Bus\QueryBusInterface;
use App\Core\User\Application\Query\FindByActive\FindByActiveQuery;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:user:find-inactive-users',
    description: 'Lista maili nieaktywnych uytkowników'
)]
class FindInactiveUsers extends Command
{
    public function __construct(private readonly QueryBusInterface $bus)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $users = $this->bus->dispatch(new FindByActiveQuery(false));

        /** @var UserDTO $user */
        foreach ($users as $user) {
            $output->writeln($user->email);
        }

        return Command::SUCCESS;
    }
}
