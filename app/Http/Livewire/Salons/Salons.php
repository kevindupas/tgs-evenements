<?php
/**
 * @author Kévin Dupas <dupas.dev@gmail.com>
 */

namespace App\Http\Livewire\Salons;

use App\Models\Salon;
use Livewire\Component;

class Salons extends Component
{
    public $salons, $title, $salon_id;
    public $isOpen = 0;

    public function render()
    {
        $this->salons = Salon::all();
        return view('livewire.salons.salons');
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
        ]);

        Salon::updateOrCreate(['id' => $this->salon_id], [
            'title' => $this->title,
        ]);

        session()->flash('message',
            $this->salon_id ? 'Salon Updated Successfully.' : 'Salon Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Salon::find($id)->delete();
        session()->flash('message', 'Salon Deleted Successfully.');
    }

    public function edit($id)
    {
        $salon = Salon::findOrFail($id);
        $this->salon_id = $id;
        $this->title = $salon->title;

        $this->openModal();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->title = '';
        $this->salon_id = '';
    }
}
