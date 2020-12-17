<?php

namespace App\Http\View\Composers;

use App\Models\Experience;
use Illuminate\View\View;

class ExperienceComposer
{
    /**
     * The user repository implementation.
     *
     * @var Experience
     */
    protected $experiences;

    /**
     * Create a new profile composer.
     *
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->experiences = new Experience();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('experiences', $this->experiences->pluck('name', 'id'));
    }
}
