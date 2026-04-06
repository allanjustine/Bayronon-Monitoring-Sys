<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Traits\DashboardTrait;

#[Layout('components.layouts.app')]
class Dashboard extends Component
{
    use DashboardTrait;

    #[Title('Admin | Dashboard')]

    #[Computed]
    public function totals()
    {
        return $this->dashboardData();
    }

    public function render()
    {
        return view('livewire.pages.dashboard');
    }
}
