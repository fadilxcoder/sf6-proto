<?php

namespace App\Service;

class ImageComparatorService
{
    public function compare(string $originalImage, string $toCheckImage)
    {
        {

            $output = shell_exec('docker run -it -d macgyvertechnology/face-comparison-model:2');
            $output = preg_replace('/[^0-9a-z]/', '', $output);
        
            # write images to container
            exec('docker cp ' . $originalImage . ' ' . $output . ':/macgyver/temp/known.jpg');
            exec('docker cp ' . $toCheckImage . ' ' . $output . ':/macgyver/temp/test.jpg');
            
            # LINUX / GCP
            // $probability = shell_exec("docker exec -t " . $output . " /bin/bash -c 'python3 /macgyver/main'");
        
            # WINDOWS
            $probability = shell_exec('docker exec -it ' . $output . ' /bin/sh -c "python3 /macgyver/main" ');
        
            # Stop the Container
            exec("docker stop " . $output);
        
            # Delete the Container
            exec("docker rm " . $output);
        
            return $probability;
        }
    }
}
