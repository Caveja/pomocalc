<?php
namespace Pomocalc\Command;

use Pomocalc\Calculator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CalculatePomodorosCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('pomodoro:calculate')
            ->setDescription('Tells you how many pomodoros are available in given amount of minutes')
            ->addArgument('minutes', InputArgument::REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $minutes = $input->getArgument('minutes');
        $calculator = new Calculator();
        $pomodoros = $calculator->getPomodorosForMinutes($minutes);

        $output->writeln("$minutes minutes are enough for $pomodoros pomodoros");
    }
}
