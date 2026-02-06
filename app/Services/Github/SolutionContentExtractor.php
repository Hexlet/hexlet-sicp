<?php

namespace App\Services\Github;

class SolutionContentExtractor
{
    public function extract(string $fullContent): string
    {
        if (preg_match('/;;;?\s*BEGIN SOLUTION\s*\n(.*?)\n;;;?\s*END SOLUTION/s', $fullContent, $matches)) {
            return trim($matches[1]);
        }

        $lines = explode("\n", $fullContent);
        $contentLines = [];
        $skipHeaders = true;

        foreach ($lines as $line) {
            if ($skipHeaders) {
                if (preg_match('/^(#lang|^\(provide|\s*$|;;;\s*(Exercise|See:))/', $line)) {
                    continue;
                }
                $skipHeaders = false;
            }
            $contentLines[] = $line;
        }

        return trim(implode("\n", $contentLines));
    }

    public function isPlaceholder(string $content, string $expectedPlaceholder): bool
    {
        $content = trim($content);

        if (empty($content)) {
            return true;
        }

        return hash('sha256', $content) === hash('sha256', trim($expectedPlaceholder));
    }
}
