<?php

namespace App\Application\Word\Command;


use App\Application\Word\WordManager\WordManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportWordCommand extends Command
{
    const Word = '/home/stephane/localhost/Lectovore/liste_francais.txt';
    /**
     * @var WordManager
     */
    private $wordManager;

    public function __construct(
        ?string $name = null,
        WordManager $wordManager
    ) {
        parent::__construct($name);
        $this->wordManager = $wordManager;
    }

    protected function configure()
    {
        $this
            ->setName('app:import-Word')
            ->setDescription('importer un dictionnaire.')
            ->setHelp('This command import Word...');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Import',
            '============',
            '',
        ]);

        $open = fopen(self::Word,'r');
        while (!feof($open))
        {
            $getTextLine = fgets($open);
            $explodeLine = explode("\r",$getTextLine);

            $word = utf8_encode($explodeLine[0]);
            dump($word);
            $this->wordManager->SaveNewWord($word);
        }

        fclose($open);


        $output->writeln([
            '============',
            'Finish',
            '============'
        ]);
    }
}
