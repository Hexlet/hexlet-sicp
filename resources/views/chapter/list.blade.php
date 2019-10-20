<ol>
    @foreach ($chapters as $chapter)
        <li>
            {{ getChapterName($chapter->path) }}
            @includeWhen($chapter->children->isNotEmpty(), 'chapter.list', ['chapters' => $chapter->children])
        </li>
    @endforeach
</ol>
