<?php

namespace App\Livewire\Backend;

use App\Models\Plan;
use Livewire\Component;

class PlanList extends Component
{
    public $perPage = 10;

    public $name;
    public $duration;
    public $price;
    public $type;
    public $status = 0;
    public $trial_days;
    public $editAbleID;
    public $deleteID;

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
        $this->price = $plan->price;
        $this->type = $plan->type;
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'price' => 'required',
            'type' => 'required',
        ]);

        try {
            if($this->editAbleID){
                $plan = Plan::find($this->editAbleID)->update([
                    'name' => $this->name,
                    'price' => $this->price,
                    'type' => $this->type,
                    'duration' => 2,
                    'status' => $this->status,
                ]);


            }else{
                Plan::create([
                    'name' => $this->name,
                    'price' => $this->price,
                    'type' => $this->type,
                    'duration' => 2,
                    'status' => $this->status,
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
