<?php
declare(strict_types=1);

namespace App\Command;

use GuzzleHttp\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckBalanceCommand extends  Command
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        parent::__construct();

        $this->client = $client;
    }

    protected function configure()
    {
        $this->setName('app:check-balance');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $response = $this->client->get('/api/account');
        $data = json_decode((string) $response->getBody(), true);

        $output->writeln(sprintf('Account balance is %s %s', $data['balance'], $data['currency']));
    }
}
