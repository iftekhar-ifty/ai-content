<?php

namespace App\Livewire\Backend;

use App\Models\Plan;
use Livewire\Component;

class PlanList extends Component
{
    public $perPage = 10;

    public $name;
    public $duration;
    public $code;
    public $price;
    public $type;
    public $status = 0;
    public $trial_days;
    public $editAbleID;
    public $deleteID;
    public $y_price;
    public $word_limit;
    public $features;
    public $planSerial;
    public $description;

    public function mount()
    {

    }

    public function create()
    {
        $this->reset();
    }

    public function edit($id)
    {
        $this->editAbleID = $id;

        $plan = Plan::find($id);

        $this->name = $plan->name;
        $this->planSerial = $plan->serial;
        $this->description = $plan->description;
        $this->y_price = $plan->y_price;
        $this->price = $plan->price;
        $this->code = $plan->code;
        $this->type = $plan->type;
        $this->word_limit = $plan->word_limit;
        $this->features = $plan->features;
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'planSerial' => 'required',
            'type' => 'required',
            'word_limit' => 'required',
            'features' => 'required',
            'code' => 'required',
            'y_price' => 'required',
        ]);

        try {

            if($this->editAbleID){
                $plan = Plan::find($this->editAbleID)->update([
                    'name' => $this->name,
                    'price' => $this->price,
                    'serial' => $this->planSerial,
                    'type' => $this->type,
                    'duration' => 2,
                    'status' => $this->status,
                    'word_limit' => $this->word_limit,
                    'code' => $this->code,
                    'y_price' => $this->y_price,
                    'features' => $this->features,
                    'description' => $this->description,
                ]);


            }else{
                Plan::create([
                    'name' => $this->name,
                    'price' => $this->price,
                    'type' => $this->type,
                    'duration' => 2,
                    'status' => $this->status,
                    'serial' => $this->planSerial,
                    'y_price' => $this->y_price,
                    'word_limit' => $this->word_limit,
                    'features' => $this->features,
                    'description' => $this->description,
                    'code' => $this->code,
                ]);
            }


            $this->redirect('/admin/plan-list');

            session()->flash('success',  'Plan Created');

        }catch(\Exception $exception){
            session()->flash('error',  $exception->getMessage());
        }
    }

    public function delete($deleteID)
    {
        $this->deleteID = $deleteID;
    }


    public function deleteItem()
    {
        $plan = Plan::find($this->deleteID)->delete();
        $this->redirect('/admin/plan-list');
        session()->flash('success',  'Plan deleted');
    }

    public function render()
    {
        $rows = Plan::query()->latest()->paginate($this->perPage);
        return view('livewire.backend.plan-list',[
            'rows' => $rows
        ])->layout('layouts.app');
    }
}
