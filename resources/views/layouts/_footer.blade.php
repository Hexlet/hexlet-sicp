<footer class="footer text-muted pb-5 mt-auto">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="h4">© Hexlet</div>
                    <hr>
                    <ul class="list-unstyled">
                        <li><a target="_blank" href="/">'{{ __('layout.footer.about') }}'</a></li>
                        <li><a target="_blank" href="https://github.com/Hexlet/hexlet-sicp">{{ __('layout.footer.source_code') }}</a></li>
                        <li><a target="_blank" href="http://slack-ru.hexlet.io/">Slack #hexlet-volunteers</a></li>
                        <li>
                            <a href="{{ url('locale/en') }}" ><i class="fa fa-language"></i>EN</a>
                            /
                            <a href="{{ url('locale/ru') }}" ><i class="fa fa-language"></i>RU</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-4">
                    <div class="h5 mb-3">{{ __('layout.footer.other_os_projects') }}</div>
                    <ul class="list-unstyled">
                        <li><a target="_blank" href="https://github.com/Hexlet/hexlet-interview">NodeJS</a></li>
                        <li><a target="_blank" href="https://github.com/Hexlet/hexlet-cv">Ruby</a></li>
                        <li><a target="_blank" href="https://github.com/Hexlet/hexlet-correction">Java</a></li>
                        <li><a target="_blank" href="https://github.com/Hexlet/hexlet-friends">Python</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4">
                    <div class="h5 mb-3">{{ __('layout.footer.help') }}</div>
                    <ul class="list-unstyled">
                        <li><a target="_blank" href="https://ru.hexlet.io/knowledge">{{ __('layout.footer.knowledge') }}</a></li>
                        <li><a target="_blank" href="https://ru.hexlet.io/blog">{{ __('layout.footer.blog') }}</a></li>
                        <li><a target="_blank" href="https://ru.hexlet.io/pages/recommended-books">{{ __('layout.footer.recommended_books') }}</a></li>
                    </ul>
                    <div class="h5 mb-3">{{ __('layout.footer.additionally') }}</div>
                    <ul class="list-unstyled">
                        <li><a target="_blank" href="https://ru.code-basics.com/">Code Basics</a></li>
                        <li><a target="_blank" href="https://codebattle.hexlet.io/">Code Battles</a></li>
                        <li><a target="_blank" href="https://guides.hexlet.io/">Hexlet Guides</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
