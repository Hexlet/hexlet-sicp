<?php
/**
 * Author: Ilya Kolesnikov
 * DateStart: 31/08/2019
 * TimeStart: 09:46
 * Created with PhpStorm
 */

namespace App\Classes\Services;




use App\Models\Chapters;

class ChaptersService
{
    /**
     * returns chapters of given book with flag for every chapter is it a leaf or not
     *
     * @return Chapters[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getChapters($book)
    {
        $chapters = Chapters::where('book', $book)->get();

        foreach ($chapters as $key => $chapter) {
            if (isset($previousChapterKey) && isset($previousChapterNumber)) {
                $chapters[$previousChapterKey]->isLeaf = $this->isLeaf($previousChapterNumber, $chapter->number, '.');
            }
            $previousChapterKey = $key;
            $previousChapterNumber = $chapter->number;
        }

        // set for last chapter, it is always a leaf
        $chapters[$previousChapterKey]->isLeaf = true;


        return $chapters;
    }

    /**
     * determine if previousChapter is a leaf
     * works only with ordered chapters list (as it is in every book)
     *
     * @param $previousChapter - chapter for which we want to know is it a leaf
     * @param $currentChapter - next to $previousChapter chapter in contents
     * @param $separator - which symbol is used to separate chapter number levels, like "2.1.3" or "2 1 3", usually it's a point
     * @return bool
     */
    private function isLeaf($previousChapter, $currentChapter, $separator)
    {
        if ($this->chapterLevel($previousChapter, $separator) >= $this->chapterLevel($currentChapter, $separator)) {
            $isLeaf = true;
        } else {
            $isLeaf = false;
        }

        return $isLeaf;
    }

    /**
     * determine level of given chapter using giving separator
     *
     * @param $chapter
     * @param $separator
     * @return int
     */
    private function chapterLevel($chapter, $separator)
    {
        $level = substr_count($chapter, $separator);

        return $level;
    }
}