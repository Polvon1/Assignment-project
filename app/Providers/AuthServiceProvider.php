<?php

namespace App\Providers;


use App\Models\Category;
use App\Models\District;
use App\Models\Exam;
use App\Models\Group;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Region;
use App\Policies\CategoryPolicy;
use App\Policies\DistrictPolicy;
use App\Policies\ExamPolicy;
use App\Policies\GroupPolicy;
use App\Policies\QuestionPolicy;
use App\Policies\QuizPolicy;
use App\Policies\RegionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Region::class => RegionPolicy::class,
        District::class => DistrictPolicy::class,
        Category::class => CategoryPolicy::class,
        Quiz::class => QuizPolicy::class,
        Question::class => QuestionPolicy::class,
        Exam::class => ExamPolicy::class,
        Group::class => GroupPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
