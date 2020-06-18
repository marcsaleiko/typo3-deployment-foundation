<?php
declare(strict_types=1);

use Symfony\Component\Console\Application;

$application = new Application();

$application->setName("TYPO3 Deployment Foundation Tool");

// ... register commands
$application->add( new \MarcSaleiko\Typo3DeploymentFoundation\Command\InstallCommand() );

$application->run();