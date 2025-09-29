@php
    /**
     * @var Chapter $chapter
     * @var Collection $chapterMembers
     * @var Collection $exerciseMembers
     * @var Collection $chapters
     * @var int $level
     */

    use App\Models\Chapter;
    use Illuminate\Support\Collection;
    use App\Helpers\ChapterHelper;

    $hasChildren = $chapter->children->isNotEmpty();
    $isCompleted = $chapterMembers->has($chapter->id) && $chapterMembers[$chapter->id]->isFinished();

    if ($hasChildren) {
      $completedChildren = 0;
      $totalChildren = 0;

      foreach($chapter->children as $child) {
        $fullChild = $chapters->find($child->id);
        if($fullChild && $fullChild->children->count() > 0) {
          foreach($fullChild->children as $grandChild) {
            $totalChildren++;
            if($chapterMembers->has($grandChild->id) && $chapterMembers[$grandChild->id]->isFinished()) {
              $completedChildren++;
            }
          }
        } else {
          $totalChildren++;
          if($chapterMembers->has($child->id) && $chapterMembers[$child->id]->isFinished()) {
            $completedChildren++;
          }
        }
      }

      $badgeClass = match (true) {
        $completedChildren === $totalChildren => 'bg-success',
        $completedChildren > 0 => 'bg-warning',
        default => 'bg-secondary'
      };
    }

    $paddingClass = match($level) {
      1,2 => 'ps-4',
      default => ''
    };

    $badgeSize = $level > 0 ? 'small' : '';
@endphp

<div class="chapter-item mb-3 {{ $paddingClass }}">
    @if($hasChildren)
        <div class="d-flex align-items-center justify-content-between p-2 border rounded"
             data-bs-toggle="collapse"
             data-bs-target="#children-{{ $chapter->id }}"
             role="button"
             aria-expanded="false">
            <div class="d-flex align-items-center">
                <i class="bi bi-chevron-right me-2"></i>
                <a href="{{ route('chapters.show', $chapter) }}"
                   class="text-decoration-none {{ $level === 0 ? 'text-dark fw-bold' : ($isCompleted ? 'text-success' : 'text-muted') }}"
                >
                    {{ ChapterHelper::fullChapterName($chapter->path) }}. {{ $chapter->title }}
                </a>
            </div>
            <span class="badge {{ $badgeClass }} {{ $badgeSize }}">
        {{ $completedChildren }}/{{ $totalChildren }}
      </span>
        </div>
        <div class="collapse" id="children-{{ $chapter->id }}">
            <div class="chapter-children mt-2">
                @foreach($chapter->children->sortBy('path') as $child)
                    @include(
                            'partials.user_chapter_partial',
                            [
                                'chapters' => $chapters,
                                'chapter' => $chapters->find($child->id),
                                'chapterMembers' => $chapterMembers,
                                'exerciseMembers' => $exerciseMembers,
                                'level' => $level + 1
                            ]
                    )
                @endforeach
            </div>
        </div>
    @else
        <div class="{{ $level === 0 ? 'p-2 border rounded' : '' }}">
            <div class="d-flex align-items-center py-1">
                <span class="me-2">
                    @if($isCompleted)
                        <i class="bi bi-check-circle-fill text-success"></i>
                    @else
                        <i class="bi bi-circle text-muted"></i>
                    @endif
                </span>
                <a href="{{ route('chapters.show', $chapter) }}"
                   class="text-decoration-none {{ $level === 0 ? 'text-dark fw-bold' : ($isCompleted ? 'text-success' : 'text-muted') }}">
                    {{ ChapterHelper::fullChapterName($chapter->path) }}. {{ $chapter->title }}
                </a>
            </div>

            @if($chapter->exercises->isNotEmpty())
                <div class="ms-4 mt-1">
                    @foreach($chapter->exercises as $exercise)
                        @php
                            $isExerciseCompleted = $exerciseMembers->has($exercise->id) && $exerciseMembers[$exercise->id]->isFinished();
                            $isExerciseStarted = $exerciseMembers->has($exercise->id) && $exerciseMembers[$exercise->id]->isStarted();
                        @endphp
                        <div class="d-flex align-items-center py-1 small">
                            <span class="me-2">
                                @if($isExerciseCompleted)
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                @elseif($isExerciseStarted)
                                    <i class="bi bi-clock-history text-warning"></i>
                                @else
                                    <i class="bi bi-circle text-muted"></i>
                                @endif
                            </span>
                            <a href="{{ route('exercises.show', $exercise) }}"
                               class="text-decoration-none link-secondary"
                            >
                                {{ $exercise->getFullTitle() }}
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endif
</div>
