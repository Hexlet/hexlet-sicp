<footer class='bg-light border-top py-4 mt-auto'>
    <div class='container-xl'>
        <div class="row justify-content-lg-around">
            <div class="col-sm-6 col-md-3 col-lg-auto">
                <a class="text-dark px-0 py-0 text-decoration-none " href="https://ru.hexlet.io">
                    <p class="h3 mb-2">&copy; Hexlet</p></a>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" href="{{ route('pages.show', ['page' => 'about']) }}">{{ __('layout.footer.about') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://github.com/Hexlet/hexlet-sicp">{{ __('layout.footer.source_code') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://slack-ru.hexlet.io/">Slack #hexlet-volunteers</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-auto">
                <p class="h5 mb-3">{{ __('layout.footer.help') }}</p>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://ru.hexlet.io/blog">{{ __('layout.footer.blog') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://ru.hexlet.io/knowledge">{{ __('layout.footer.knowledge') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://ru.hexlet.io/pages/recommended-books">{{ __('layout.footer.recommended_books') }}</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-auto">
                <p class="h5 mb-3">{{ __('layout.footer.other_os_projects') }}</p>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://github.com/Hexlet/hexlet-cv">{{ __('layout.footer.os_projects.cv') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://github.com/Hexlet/hexlet-editor">{{ __('layout.footer.os_projects.editor') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://github.com/Hexlet/hexlet-friends">{{ __('layout.footer.os_projects.friends') }}</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-auto">
                <p class="h5 mb-3">{{ __('layout.footer.additionally') }}</p>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://ru.code-basics.com/">{{ __('layout.footer.os_projects.code_basics') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://codebattle.hexlet.io/">{{ __('layout.footer.os_projects.codebattle') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://guides.hexlet.io/">{{ __('layout.footer.os_projects.guides') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
