<ol>
    @foreach ($chapters[$parent] as $key => $chapter)
        <li>
            <a href="{{ route('chapters.show', $chapter['id']) }}">{{ getChapterName($chapter['path']) }}</a>
            @includeWhen(array_key_exists($chapter['id'], $chapters), 'chapter.list', ['chapters' => $chapters, 'parent' => $chapter['id']])
        </li>
    @endforeach
</ol>
