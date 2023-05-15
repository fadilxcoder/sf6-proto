<?php

namespace App\Command;

use Symfony\Component\Filesystem\Filesystem;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

#[AsCommand(
    name: 'app:image:text',
    description: 'Read an image to retrieve text',
)]
class ImageTextCommand extends Command
{
    private const IMAGES = [
        'bussiness-card.png',
        'student-id.jpg',
        'text-image.png',
    ];

    public function __construct(
        private ParameterBagInterface $parameterBag
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $dir = $this->parameterBag->get('kernel.project_dir') . '/public/assets/images';
        $filesystem = new Filesystem();

        foreach (self::IMAGES as $images) {
            $img = $dir . '/' . $images;
            $data = (new TesseractOCR($img))->run();
            $io->note($data);
        }

        $io->success('OCR successfully terminated.');

        return Command::SUCCESS;
    }
}
