<?php

namespace Pomocalc\Tests\Command;

use Pomocalc\Command\CalculatePomodorosCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class CalculatePomodorosCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    private $application;

    /**
     * @var CalculatePomodorosCommand
     */
    private $command;

    /**
     * @var CommandTester
     */
    private $commandTester;

    protected function setUp()
    {
        $this->application = new Application();
        $this->application->add(new CalculatePomodorosCommand());
        $this->command = $this->application->find('pomodoro:calculate');
        $this->commandTester = new CommandTester($this->command);
    }

    public function testMinutes()
    {
        $this->commandTester->execute(array('command' => $this->command->getName(), 'minutes' => 25));
        $this->assertRegExp('/25 minutes are enough for 1 pomodoros/', $this->commandTester->getDisplay());
    }

    public function testHours()
    {
        $this->commandTester->execute(['command' => $this->command->getName(), 'minutes' => 1, '-H' => null]);
        $this->assertRegExp('/60 minutes are enough for 2 pomodoros/', $this->commandTester->getDisplay());
    }
}
