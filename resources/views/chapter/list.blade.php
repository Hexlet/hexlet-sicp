<ol>
    @foreach ($chapters[$parent] as $chapter)
        <li>
            <a href="{{ route('chapters.show', $chapter->id) }}">{{ getChapterName($chapter->path) }}</a>
            @includeWhen(isset($chapters[$chapter->id]), 'chapter.list', ['chapters' => $chapters, 'parent' => $chapter->id])
        </li>
    @endforeach
</ol>
