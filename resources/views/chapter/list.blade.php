<ol>
    @foreach ($chapters as $chapter)
        <li>
            <a href="{{ route('chapters.show', $chapter) }}">{{ getChapterName($chapter->path) }}</a>
            @includeWhen($chapter->children->isNotEmpty(), 'chapter.list', ['chapters' => $chapter->children])
        </li>
    @endforeach
</ol>
