<?php

namespace App\Livewire\Backend;

use App\Models\Setting;
use Livewire\Component;

class GeneralSetting extends Component
{
    public $stripe_p;
    public $stripe_s;
    public $setting;

    public function mount()
    {
        $this->setting = Setting::find(1);

        if($this->setting){

            $this->stripe_p = $this->setting->stripe_p;
            $this->stripe_s = $this->setting->stripe_s;
        }

    }

    public function render()
    {
        return view('livewire.backend.general-setting')->layout('layouts.app');
    }

    public function submit()
    {
        $this->validate([
            'stripe_p' => 'required',
            'stripe_s' => 'required',
        ]);



        try {
            if($this->setting){
                $user = $this->setting->update(
                    [
                        'stripe_p' =>  $this->stripe_p,
                        'stripe_s' => $this->stripe_s
                    ]
                );

                session()->flash('status', 'Setting successfully updated.');
            }else{
                Setting::create([
                    'stripe_p' =>  $this->stripe_p,
                    'stripe_s' => $this->stripe_s
                ]);
                session()->flash('status', 'Setting successfully updated.');
            }

        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }
}
