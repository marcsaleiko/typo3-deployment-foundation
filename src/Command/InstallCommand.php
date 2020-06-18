<?php
namespace MarcSaleiko\Typo3DeploymentFoundation\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class InstallCommand extends Command
{
    const BASE_PATH = '../../../';

    const ENVIRONMENTS = [
        'staging',
        'production',
    ];

    protected static $defaultName = 'install';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->title("Install deployment foundation");

        foreach( self::ENVIRONMENTS as $env ) {
            $thisBasePath = self::BASE_PATH.$env;
            mkdir($thisBasePath);
            mkdir($thisBasePath.'/current');
            mkdir($thisBasePath.'/releases');
            mkdir($thisBasePath.'/shared');
            mkdir($thisBasePath.'/shared/public');
            mkdir($thisBasePath.'/shared/public/fileadmin');
            mkdir($thisBasePath.'/shared/public/typo3temp');
            mkdir($thisBasePath.'/shared/public/uploads');
            mkdir($thisBasePath.'/shared/var');
            mkdir($thisBasePath.'/shared/config');

            $io->text("Added standard folders for environment " . $env);
        }
        return Command::SUCCESS;
    }
}