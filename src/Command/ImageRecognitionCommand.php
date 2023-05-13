<?php

namespace App\Command;

use App\Service\ImageComparatorService;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

#[AsCommand(
    name: 'app:image:recognition',
    description: 'Comparing 2 images to check match probability',
)]
class ImageRecognitionCommand extends Command
{
    private const IMAGES = [
        'elon' => [
            'original' => 'elon-original.jpg',
            '1' => 'elon2.jpg',
            '2' => 'elon3.jpg',
        ],
        'obama' => [
            'original' => 'obama-original.jpg',
            '1' => 'obama2.jpg',
            '2' => 'obama3.jpg',
        ],
    ];

    public function __construct(
        private ImageComparatorService $imageComparatorService,
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

        $imageOriginal = $dir . '/' . self::IMAGES['elon']['original'];
        $imageToCheck = $dir . '/' . self::IMAGES['elon']['1'];

        try {
            $filesystem->exists($imageOriginal);
            $filesystem->exists($imageToCheck);
            $io->success($this->imageComparatorService->compare($imageOriginal, $imageToCheck));
        } catch (IOExceptionInterface $exception) {
            $io->error($exception->getMessage());

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
