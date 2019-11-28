<ol>
    @foreach ($chapters as $chapter)
        <li>
            <a href="{{ route('chapters.show', $chapter) }}">{{ getChapterName($chapter->path) }}</a>
            @includeWhen(count($chapter->children), 'chapter.list', ['chapters' => $chapter->children])
        </li>
    @endforeach
</ol>
