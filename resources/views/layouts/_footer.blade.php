<footer>
  <div class="container">
    <div class="row gap-4 gap-lg-0 row-cols-1 row-cols-lg-4 py-5">
      <div class="col-5">
        <ul class="nav flex-column align-items-start">
          <li><a href="{{ route('pages.show', ['page' => 'about']) }}"
              class="nav-link px-0">{{ __('layout.footer.about') }}</a></li>
          <li><a href="https://github.com/Hexlet/hexlet-sicp"
              class="nav-link px-0">{{ __('layout.footer.source_code') }}</a></li>
          <li><a href="https://t.me/hexletcommunity/12"
              class="nav-link px-0">{{ __('layout.footer.volunteers_in_tg') }}</a></li>
        </ul>
      </div>
      <div class="col-5">
        <div class="fw-bold">{{ __('layout.footer.help') }}</div>
        <ul class="nav flex-column align-items-start">
          <li><a href="https://ru.hexlet.io/blog" class="nav-link px-0">{{ __('layout.footer.blog') }}</a>
          </li>
          <li><a href="https://ru.hexlet.io/knowledge" class="nav-link px-0">{{ __('layout.footer.knowledge') }}</a>
          </li>
          <li><a href="https://ru.hexlet.io/pages/recommended-books"
              class="nav-link px-0">{{ __('layout.footer.recommended_books') }}</a></li>
        </ul>
      </div>
      <div class="col-5">
        <div class="fw-bold">{{ __('layout.footer.other_os_projects') }}</div>
        <ul class="nav flex-column align-items-start">
          <li><a class="nav-link px-0"
              href="https://github.com/Hexlet/hexlet-cv">{{ __('layout.footer.os_projects.cv') }}</a></li>
          <li><a class="nav-link px-0"
              href="https://github.com/hexlet-rus/runit">{{ __('layout.footer.os_projects.editor') }}</a></li>
          <li><a class="nav-link px-0"
              href="https://github.com/Hexlet/hexlet-friends">{{ __('layout.footer.os_projects.friends') }}</a></li>
        </ul>
      </div>
      <div class="col-5">
        <div class="fw-bold">{{ __('layout.footer.additionally') }}</div>
        <ul class="nav flex-column align-items-start">
          <li><a class="nav-link px-0" href="https://ru.hexlet.io/">{{ __('layout.footer.os_projects.hexlet') }}</a>
          </li>
          <li><a class="nav-link px-0"
              href="https://ru.code-basics.com/">{{ __('layout.footer.os_projects.code_basics') }}</a></li>
          <li><a class="nav-link px-0"
              href="https://codebattle.hexlet.io/">{{ __('layout.footer.os_projects.codebattle') }}</a></li>
          <li><a class="nav-link px-0"
              href="https://guides.hexlet.io/">{{ __('layout.footer.os_projects.guides') }}</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
