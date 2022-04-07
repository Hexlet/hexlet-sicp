@php
/** @var \App\Models\User $user */
/** @var \App\Models\Exercise $exercise */
/** @var string $checkOutput */
@endphp
<div class="card">
        <ul class="justify-content-center flex-shrink-0 nav nav-tabs" id="editor-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link rounded-0 active" id="editor-home-tab" data-bs-toggle="tab" href="#editor" role="tab" aria-controls="editor" aria-selected="true">
                    {{ __('exercise.show.editor-tab') }}
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link rounded-0" id="editor-tests-tab" data-bs-toggle="tab" href="#editor-tests" role="tab" aria-controls="editor-tests" aria-selected="false">
                    {{ __('exercise.show.tests-tab') }}
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link rounded-0" id="editor-contact-tab" data-bs-toggle="tab" href="#editor-output" role="tab" aria-controls="editor-output" aria-selected="false">
                    {{ __('exercise.show.output-tab') }}
                </a>
            </li>
        </ul>
        <div class="tab-content card-body" id="pills-tab-content">
            <div class="tab-pane fade show active" id="editor" role="tabpanel" aria-labelledby="editor">
                {{ BsForm::open(null, ['wire:submit.prevent' => 'check']) }}
                @include('flash::message')
                {{ BsForm::textarea('content')->placeholder(__('solution.placeholder'))->required()->cols(200)
                       ->attribute('wire:model.defer', 'solutionCode')
                       ->attribute('id', 'x-editor-textarea')
                       ->attribute('wire:loading.attr', "disabled")
                       ->attribute('wire:target', "check") }}
                {{ Form::hidden('exercise_id', $exercise->id) }}
                @auth
                <button wire:click="save"
                        wire:target="save"
                        wire:loading.attr="disabled"
                        class="btn btn-success"
                        type="button"
                >
                    <div wire:loading wire:target="save">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </div>
                    <div wire:loading.remove wire:target="save">
                        {{ __('solution.save') }}
                    </div>
                </button>
                @endauth
                <button wire:click="check"
                        wire:target="check"
                        wire:loading.attr="disabled"
                        class="btn btn-primary float-right"
                        type="button"
                >
                    <div wire:loading wire:target="check">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </div>
                    <div wire:loading.remove wire:target="check">
                        {{ __('exercise.show.editor.run') }}
                    </div>
                </button>
                {{ BsForm::close() }}
            </div>
            <div class="tab-pane fade" id="editor-tests" role="tabpanel" aria-labelledby="editor-tests">
                <pre><code class="lang-scheme hljs">{{ $tests }}</code></pre>
            </div>
            <div class="tab-pane fade" id="editor-output" role="tabpanel" aria-labelledby="editor-output">
                <pre><code class="lang-vbnet hljs x-text-pre-wrap">{{ $checkOutput }}</code></pre>
            </div>
        </div>
</div>
