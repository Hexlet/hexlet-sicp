<?php

namespace sniffs\Standards\HexletSicp\Sniffs\Classes;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class DebugFunctionsSearchSniff implements Sniff
{
    /**
     * @return array(int)
     */
    public function register(): array
    {
        return array(T_STRING);
    }

    /**
     * @param File $phpcsFile The current file being checked.
     * @param int $stackPtr The position of the current token in the
     * stack passed in $tokens.
     *
     * @todo Улучшить реализацию определения функций, текущий вариант может выдавать ложно-положительные результаты
     * @return void
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $content = $tokens[$stackPtr]['content'];
        if (in_array(strtolower($content), ['var_dump', 'dd', 'ddd', 'print_r', 'debug_print_backtrace', 'dump'], true)) {
            $error = 'Debug function found %s';
            $data = array(trim($content));
            $phpcsFile->addError($error, $stackPtr, 'Found', $data);
        }
    }
}
