<?php

namespace Pomocalc\Tests\Command;

use Pomocalc\Command\CalculatePomodorosCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class CalculatePomodorosCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $application = new Application();

        $application->add(new CalculatePomodorosCommand());

        $command = $application->find('pomodoro:calculate');
        $commandTester = new CommandTester($command);

        $commandTester->execute(array('command' => $command->getName(), 'minutes' => 25));

        $this->assertRegExp('/25 minutes are enough for 1 pomodoros/', $commandTester->getDisplay());
    }
}
