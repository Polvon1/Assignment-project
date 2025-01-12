<div class="nk-sidebar" data-content="sidebarMenu">
    <div class="nk-sidebar-inner" data-simplebar>
        <ul class="nk-menu nk-menu-md">
            <li class="nk-menu-heading">
                <h6 class="overline-title text-primary-alt">{{ __('sidebar.dashboard.title') }}</h6>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('dashboard.index') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                    <span class="nk-menu-text">{{ __('sidebar.dashboard.index') }}</span>
                </a>
            </li>

            @hasanyrole(\App\Support\Enums\RoleEnum::admin_moderator_organization_roles_to_string())
            <li class="nk-menu-heading">
                <h6 class="overline-title text-primary-alt">{{ __('sidebar.user.title') }}</h6>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('dashboard.user.index') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                    <span class="nk-menu-text">{{ __('sidebar.user.users') }}</span>
                </a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('dashboard.system.user.index') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                    <span class="nk-menu-text">{{ __('sidebar.user.system-users') }}</span>
                </a>
            </li>
            @endhasanyrole

            @hasanyrole(\App\Support\Enums\RoleEnum::admin_moderator_roles_to_string())
            <li class="nk-menu-heading">
                <h6 class="overline-title text-primary-alt">{{ __('sidebar.organization.title') }}</h6>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('dashboard.organization.index') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-user-c"></em></span>
                    <span class="nk-menu-text">{{ __('sidebar.organization.index') }}</span>
                </a>
            </li>
            @endhasanyrole

            @hasanyrole(\App\Support\Enums\RoleEnum::admin_moderator_organization_roles_to_string())
            <li class="nk-menu-heading">
                <h6 class="overline-title text-primary-alt">{{ __('sidebar.quiz.title') }}</h6>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('dashboard.category.index') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-menu-squared"></em></span>
                    <span class="nk-menu-text">{{ __('sidebar.quiz.category') }}</span>
                </a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('dashboard.quiz.index') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-property"></em></span>
                    <span class="nk-menu-text">{{ __('sidebar.quiz.index') }}</span>
                </a>
            </li>
            @endhasanyrole
            @hasanyrole(\App\Support\Enums\RoleEnum::admin_moderator_organization_roles_to_string())
            <li class="nk-menu-heading">
                <h6 class="overline-title text-primary-alt">{{ __('sidebar.report.title') }}</h6>
            </li>
            <li class="nk-menu-item">
                <a href="#" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-folder-list"></em></span>
                    <span class="nk-menu-text">{{ __('sidebar.report.index') }}</span>
                </a>
            </li>
            @hasanyrole(\App\Support\Enums\RoleEnum::admin_moderator_roles_to_string())
            <li class="nk-menu-item">
                <a href="#" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                    <span class="nk-menu-text">{{ __('sidebar.report.application') }}</span>
                </a>
            </li>
            @endhasanyrole
            @endhasanyrole
            {{--            <li class="nk-menu-heading">--}}
            {{--                <h6 class="overline-title text-primary-alt">Components</h6>--}}
            {{--            </li><!-- .nk-menu-heading -->--}}
            {{--            <li class="nk-menu-item has-sub">--}}
            {{--                <a href="#" class="nk-menu-link nk-menu-toggle">--}}
            {{--                    <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>--}}
            {{--                    <span class="nk-menu-text">Ui Elements</span>--}}
            {{--                </a>--}}
            {{--                <ul class="nk-menu-sub">--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/alerts.html" class="nk-menu-link"><span class="nk-menu-text">Alerts</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/accordions.html" class="nk-menu-link"><span class="nk-menu-text">Accordions</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/avatar.html" class="nk-menu-link"><span class="nk-menu-text">Avatar</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/badges.html" class="nk-menu-link"><span class="nk-menu-text">Badges</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/buttons.html" class="nk-menu-link"><span class="nk-menu-text">Buttons</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/buttons-group.html" class="nk-menu-link"><span class="nk-menu-text">Button Group</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/breadcrumb.html" class="nk-menu-link"><span class="nk-menu-text">Breadcrumb</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/cards.html" class="nk-menu-link"><span class="nk-menu-text">Cards</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/carousel.html" class="nk-menu-link"><span class="nk-menu-text">Carousel</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/list-dropdown.html" class="nk-menu-link"><span class="nk-menu-text">List Dropdown</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/modals.html" class="nk-menu-link"><span class="nk-menu-text">Modals</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/pagination.html" class="nk-menu-link"><span class="nk-menu-text">Pagination</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/popover.html" class="nk-menu-link"><span class="nk-menu-text">Popovers</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/progress.html" class="nk-menu-link"><span class="nk-menu-text">Progress</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/spinner.html" class="nk-menu-link"><span class="nk-menu-text">Spinner</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/tabs.html" class="nk-menu-link"><span class="nk-menu-text">Tabs</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/toast.html" class="nk-menu-link"><span class="nk-menu-text">Toasts</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/tooltip.html" class="nk-menu-link"><span class="nk-menu-text">Tooltip</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/elements/typography.html" class="nk-menu-link"><span class="nk-menu-text">Typography</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">Utilities</span></a>--}}
            {{--                        <ul class="nk-menu-sub">--}}
            {{--                            <li class="nk-menu-item"><a href="html/components/elements/util-border.html" class="nk-menu-link"><span class="nk-menu-text">Border</span></a></li>--}}
            {{--                            <li class="nk-menu-item"><a href="html/components/elements/util-colors.html" class="nk-menu-link"><span class="nk-menu-text">Colors</span></a></li>--}}
            {{--                            <li class="nk-menu-item"><a href="html/components/elements/util-display.html" class="nk-menu-link"><span class="nk-menu-text">Display</span></a></li>--}}
            {{--                            <li class="nk-menu-item"><a href="html/components/elements/util-embeded.html" class="nk-menu-link"><span class="nk-menu-text">Embeded</span></a></li>--}}
            {{--                            <li class="nk-menu-item"><a href="html/components/elements/util-flex.html" class="nk-menu-link"><span class="nk-menu-text">Flex</span></a></li>--}}
            {{--                            <li class="nk-menu-item"><a href="html/components/elements/util-text.html" class="nk-menu-link"><span class="nk-menu-text">Text</span></a></li>--}}
            {{--                            <li class="nk-menu-item"><a href="html/components/elements/util-sizing.html" class="nk-menu-link"><span class="nk-menu-text">Sizing</span></a></li>--}}
            {{--                            <li class="nk-menu-item"><a href="html/components/elements/util-spacing.html" class="nk-menu-link"><span class="nk-menu-text">Spacing</span></a></li>--}}
            {{--                            <li class="nk-menu-item"><a href="html/components/elements/util-others.html" class="nk-menu-link"><span class="nk-menu-text">Others</span></a></li>--}}
            {{--                        </ul><!-- .nk-menu-sub -->--}}
            {{--                    </li>--}}
            {{--                </ul><!-- .nk-menu-sub -->--}}
            {{--            </li><!-- .nk-menu-item -->--}}
            {{--            <li class="nk-menu-item has-sub">--}}
            {{--                <a href="#" class="nk-menu-link nk-menu-toggle">--}}
            {{--                    <span class="nk-menu-icon"><em class="icon ni ni-dot-box"></em></span>--}}
            {{--                    <span class="nk-menu-text">Crafted Icons</span>--}}
            {{--                </a>--}}
            {{--                <ul class="nk-menu-sub">--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/misc/svg-icons.html" class="nk-menu-link">--}}
            {{--                            <span class="nk-menu-text">SVG Icon - Exclusive</span>--}}
            {{--                        </a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/misc/nioicon.html" class="nk-menu-link">--}}
            {{--                            <span class="nk-menu-text">Nioicon - HandCrafted</span>--}}
            {{--                        </a>--}}
            {{--                    </li>--}}
            {{--                </ul><!-- .nk-menu-sub -->--}}
            {{--            </li><!-- .nk-menu-item -->--}}
            {{--            <li class="nk-menu-item">--}}
            {{--                <a href="html/components/misc/icons.html" class="nk-menu-link">--}}
            {{--                    <span class="nk-menu-icon"><em class="icon ni ni-menu-circled"></em></span>--}}
            {{--                    <span class="nk-menu-text">Icon Libraries</span>--}}
            {{--                </a>--}}
            {{--            </li><!-- .nk-menu-item -->--}}
            {{--            <li class="nk-menu-item has-sub">--}}
            {{--                <a href="#" class="nk-menu-link nk-menu-toggle">--}}
            {{--                    <span class="nk-menu-icon"><em class="icon ni ni-table-view"></em></span>--}}
            {{--                    <span class="nk-menu-text">Tables</span>--}}
            {{--                </a>--}}
            {{--                <ul class="nk-menu-sub">--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/tables/table-basic.html" class="nk-menu-link"><span class="nk-menu-text">Basic Tables</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/tables/table-special.html" class="nk-menu-link"><span class="nk-menu-text">Special Tables</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/tables/table-datatable.html" class="nk-menu-link"><span class="nk-menu-text">DataTables</span></a>--}}
            {{--                    </li>--}}
            {{--                </ul><!-- .nk-menu-sub -->--}}
            {{--            </li><!-- .nk-menu-item -->--}}
            {{--            <li class="nk-menu-item has-sub">--}}
            {{--                <a href="#" class="nk-menu-link nk-menu-toggle">--}}
            {{--                    <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>--}}
            {{--                    <span class="nk-menu-text">Forms</span>--}}
            {{--                </a>--}}
            {{--                <ul class="nk-menu-sub">--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/forms/form-elements.html" class="nk-menu-link"><span class="nk-menu-text">Form Elements</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/forms/checkbox-radio.html" class="nk-menu-link"><span class="nk-menu-text">Checkbox Radio</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/forms/advanced-controls.html" class="nk-menu-link"><span class="nk-menu-text">Advanced Controls</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/forms/input-group.html" class="nk-menu-link"><span class="nk-menu-text">Input Group</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/forms/form-upload.html" class="nk-menu-link"><span class="nk-menu-text">Form Upload</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/forms/datetime-picker.html" class="nk-menu-link"><span class="nk-menu-text">Date &amp; Time Picker</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/forms/number-spinner.html" class="nk-menu-link"><span class="nk-menu-text">Number Spinner</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/forms/nouislider.html" class="nk-menu-link"><span class="nk-menu-text">noUiSlider</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/forms/form-layouts.html" class="nk-menu-link"><span class="nk-menu-text">Form Layouts</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/forms/form-validation.html" class="nk-menu-link"><span class="nk-menu-text">Form Validation</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/forms/form-wizard.html" class="nk-menu-link"><span class="nk-menu-text">Wizard Basic</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">Rich Editor</span></a>--}}
            {{--                        <ul class="nk-menu-sub">--}}
            {{--                            <li class="nk-menu-item"><a href="html/components/forms/form-summernote.html" class="nk-menu-link"><span class="nk-menu-text">Summernote</span></a></li>--}}
            {{--                            <li class="nk-menu-item"><a href="html/components/forms/form-quill.html" class="nk-menu-link"><span class="nk-menu-text">Quill</span></a></li>--}}
            {{--                            <li class="nk-menu-item"><a href="html/components/forms/form-tinymce.html" class="nk-menu-link"><span class="nk-menu-text">Tinymce</span></a></li>--}}
            {{--                        </ul><!-- .nk-menu-sub -->--}}
            {{--                    </li>--}}
            {{--                </ul><!-- .nk-menu-sub -->--}}
            {{--            </li><!-- .nk-menu-item -->--}}
            {{--            <li class="nk-menu-item has-sub">--}}
            {{--                <a href="#" class="nk-menu-link nk-menu-toggle">--}}
            {{--                    <span class="nk-menu-icon"><em class="icon ni ni-pie"></em></span>--}}
            {{--                    <span class="nk-menu-text">Charts</span>--}}
            {{--                </a>--}}
            {{--                <ul class="nk-menu-sub">--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/charts/chartjs.html" class="nk-menu-link"><span class="nk-menu-text">Chart JS</span></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/charts/knob.html" class="nk-menu-link"><span class="nk-menu-text">Knob JS</span></a>--}}
            {{--                    </li>--}}
            {{--                </ul><!-- .nk-menu-sub -->--}}
            {{--            </li><!-- .nk-menu-item -->--}}
            {{--            <li class="nk-menu-item has-sub">--}}
            {{--                <a href="#" class="nk-menu-link nk-menu-toggle">--}}
            {{--                    <span class="nk-menu-icon"><em class="icon ni ni-puzzle"></em></span>--}}
            {{--                    <span class="nk-menu-text">Widgets</span>--}}
            {{--                </a>--}}
            {{--                <ul class="nk-menu-sub">--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/widgets/cards.html" class="nk-menu-link"><span class="nk-menu-text">Card Widgets</span></a>--}}
            {{--                    </li><!-- .nk-menu-item -->--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/widgets/charts.html" class="nk-menu-link"><span class="nk-menu-text">Chart Widgets</span></a>--}}
            {{--                    </li><!-- .nk-menu-item -->--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/widgets/ratings.html" class="nk-menu-link"><span class="nk-menu-text">Ratings Widget</span><span class="nk-menu-badge">New</span></a>--}}
            {{--                    </li><!-- .nk-menu-item -->--}}
            {{--                </ul><!-- .nk-menu-sub -->--}}
            {{--            </li><!-- .nk-menu-item -->--}}
            {{--            <li class="nk-menu-item has-sub">--}}
            {{--                <a href="#" class="nk-menu-link nk-menu-toggle">--}}
            {{--                    <span class="nk-menu-icon"><em class="icon ni ni-block-over"></em></span>--}}
            {{--                    <span class="nk-menu-text">Miscellaneous</span>--}}
            {{--                </a>--}}
            {{--                <ul class="nk-menu-sub">--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/misc/slick-sliders.html" class="nk-menu-link"><span class="nk-menu-text">Slick Slider</span></a>--}}
            {{--                    </li><!-- .nk-menu-item -->--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/misc/toastr.html" class="nk-menu-link"><span class="nk-menu-text">Toastr</span></a>--}}
            {{--                    </li><!-- .nk-menu-item -->--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/misc/sweet-alert.html" class="nk-menu-link"><span class="nk-menu-text">Sweet Alert</span></a>--}}
            {{--                    </li><!-- .nk-menu-item -->--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/misc/js-tree.html" class="nk-menu-link"><span class="nk-menu-text">jsTree</span></a>--}}
            {{--                    </li><!-- .nk-menu-item -->--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/misc/dual-listbox.html" class="nk-menu-link"><span class="nk-menu-text">Dual Listbox</span></a>--}}
            {{--                    </li><!-- .nk-menu-item -->--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/misc/dragula.html" class="nk-menu-link"><span class="nk-menu-text">Dragula</span><span class="nk-menu-badge">New</span></a>--}}
            {{--                    </li><!-- .nk-menu-item -->--}}
            {{--                    <li class="nk-menu-item">--}}
            {{--                        <a href="html/components/misc/map.html" class="nk-menu-link"><span class="nk-menu-text">Google Map</span><span class="nk-menu-badge">New</span></a>--}}
            {{--                    </li><!-- .nk-menu-item -->--}}
            {{--                </ul><!-- .nk-menu-sub -->--}}
            {{--            </li><!-- .nk-menu-item -->--}}
            {{--            <li class="nk-menu-item">--}}
            {{--                <a href="html/email-templates.html" class="nk-menu-link">--}}
            {{--                    <span class="nk-menu-icon"><em class="icon ni ni-text-rich"></em></span>--}}
            {{--                    <span class="nk-menu-text">Email Template</span>--}}
            {{--                </a>--}}
            {{--            </li>--}}
        </ul>
    </div>
</div>
