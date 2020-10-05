<?php

namespace App\Http\Livewire\Pekan;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use App\Pekan;

class Spending extends Component
{
	use WithPagination;

	public $pekan_id, $description, $amount;
	public $updateMode = false;

	private function resetInputFields(){
		$this->description = '';
		$this->amount = '';
	}

    public function render()
    {
    	$pekan = Pekan::where('user_id', Auth::user()->id)
    				->where('type', 'S')
                    ->orderBy('id', 'DESC')
    				->paginate(10);

        return view('livewire.pekan.spending', ['pekan' => $pekan]);
    }

    public function store()
	{
        $this->validate([
            'description'	=> 'required',
            'amount' 		=> 'required',
        ]);

        Pekan::create([
        	'user_id'		=> Auth::user()->id,
        	'type'			=> 'S',
            'description'	=> $this->description,
            'amount'		=> $this->amount
        ]);

        session()->flash('message', 'Data Telah Disimpan.');
        $this->resetInputFields();
        $this->emit('pekanStore'); // Close model to using to jquery
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $pekan = Pekan::where('id', $id)->first();
        $this->pekan_id = $pekan->id;
        $this->description = $pekan->description;
        $this->amount = (double)$pekan->amount;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate([
            'description' 	=> 'required',
            'amount' 		=> 'required',
        ]);

        if ($this->pekan_id) {
            $pekan = Pekan::find($this->pekan_id);
            $pekan->update([
                'description' 	=> $this->description,
                'amount' 		=> $this->amount,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Data Telah Diupdate');
            $this->resetInputFields();
            $this->emit('pekanStore'); // Close model to using to jquery
        }
    }

    public function delete($id)
    {
        if($id){
            Pekan::where('id', $id)->delete();
            session()->flash('message', 'Data Telah Dihapus.');
        }
    }

}
