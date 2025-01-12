<ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
    <li class="nav-item">
        <a class="nav-link @if($active == 'Profile') active @endif" href="{{ route('Profile.index') }}">
            <em class="icon ni ni-user-circle"></em>
            <span>{{ __('page.user.personal.menu') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($active == 'transaction') active @endif" href="{{ route('Profile.transactions') }}">
            <em class="icon ni ni-repeat"></em>
            <span>{{ __('page.user.transaction.menu') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($active == 'quiz') active @endif" href="{{ route('Profile.quiz') }}">
            <em class="icon ni ni-file-text"></em>
            <span>{{ __('page.user.quiz.menu') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($active == 'report') active @endif" href="{{ route('Profile.report') }}">
            <em class="icon ni ni-folder-list"></em>
            <span>{{ __('page.user.report.menu') }}</span>
        </a>
    </li>
    <li class="nav-item nav-item-trigger d-xxl-none">
        <a href="{{ route('Profile.edit') }}"
           class="btn btn-icon"
           data-bs-toggle="tooltip"
           data-bs-placement="top"
           title="{{ __('action.edit') }}"
        >
            <em class="icon ni ni-user-list-fill"></em>
        </a>
    </li>
</ul>
