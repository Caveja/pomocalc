<?php
namespace Pomocalc\Command;

use Pomocalc\Calculator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CalculatePomodorosCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('pomodoro:calculate')
            ->setDescription('Tells you how many pomodoros are available in a given amount of minutes')
            ->addArgument('minutes', InputArgument::REQUIRED, 'Minutes available')
            ->addOption('hours', 'H', InputOption::VALUE_NONE, 'If set will use hours instead of minutes')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $factor = $input->getOption('hours') ? 60 : 1;
        $minutes = $input->getArgument('minutes') * $factor;

        $calculator = new Calculator();
        $pomodoros = $calculator->getPomodorosForMinutes($minutes);

        $output->writeln("$minutes minutes are enough for $pomodoros pomodoros");
    }
}
