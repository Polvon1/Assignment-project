<?php

namespace App\Http\Livewire;

use App\Models\District;
use App\Models\Region;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class RegionSelectComponent extends Component
{
    public Collection $regions;
    public Collection $districts;
    public ?string $region_id = "0";
    public ?string $district_id = "0";
    public bool $required;




    public function mount(?string $region_id = "",?string $district_id = ""): void{
        $this->regions = Region::all();
        if ($region_id != ''){
            $this->districts = District::query()->where('region_id',$this->region_id)->get();
        }else{
            $this->districts = new Collection();
        }
        $this->district_id = $district_id;
    }

    public function updatedRegionId(){
        $this->districts = District::query()->where('region_id',$this->region_id)->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.region-select-component');
    }
}
