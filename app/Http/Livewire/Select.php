<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;

class Select extends Component
{
    public $provinsi;
    public $kabupatens=[];
    public $kabupaten;
    public $kecamatans=[];
    public $kecamatan;
    public $desas=[];
    public $desa;

    public function render()
    {
        if(!empty($this->provinsi)){
            $this->kabupatens = Regency::where('province_id',$this->provinsi)->get();
        }
        if(!empty($this->kabupaten)){
            $this->kecamatans = District::where('regency_id',$this->kabupaten)->get();
        }
        if(!empty($this->kecamatan)){
            $this->desas = Village::where('district_id',$this->kecamatan)->get();
        }
        
        return view('livewire.select',[
            'provinces' => Province::orderBy('name')->get(),

        ]);
        
    }
}
