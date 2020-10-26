<?php

namespace App\Http\Livewire\Lead;

use App\Models\Lead;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Leads extends Component
{
    use WithPagination;

   // public $leads;

    public $isUpdate = false;

    public $nom;
    public $prenom;
    public $email;
    public $ville;
    public $address;
    public $tele;
    public $produit;

    public $leadId;

    public $authAdmin;

     public function render()
    {
        return view('livewire.lead.__basic',[
            'leads' =>Lead::all()
        ]);
    }

    public function mount(Lead $lead)
    {

      // $this->leads = $lead::all();
       // $this->leads =Lead::paginate(10);
        $this->authAdmin = Auth::user();
    }

    public function submit()
    {
        $this->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'nullable|email',
            'ville' => 'required|string',
            'address' => 'required|string',
            'tele' => 'required|numeric',
            'produit' => 'required|string'
        ]);

        // Execution doesn't reach here if validation fails.

        // dd($this->authAdmin);
        $lead = Lead::create([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'ville' => $this->ville,
            'address' => $this->address,
            'tele' => $this->tele,
            'produit' => $this->produit,
            'addedby' => $this->authAdmin->fullName(),
            'source' => 'direct-admin'

        ]);

        if ($lead) {
            $this->resetIput();
            return redirect()->route('admin.leads');
        }
    }


    public function editLead($id)
    {
        $lead = lead::findOrFail($id);
        $this->leadId = $lead->id;
        $this->isUpdate = true;
        
        $this->nom = $lead->nom;
        $this->prenom = $lead->prenom;
        $this->email = $lead->email;
        $this->ville = $lead->ville;
        $this->address = $lead->address;
        $this->tele = $lead->tele;
        $this->produit = $lead->produit;
        
        // return view('livewire.edit-admin');
    }
    public function update()
    {
        //dd('yyyy');
        // The current user can update the post...
        $this->validate([

            //'name' => 'required|string|unique:leads,name,' . $this->leadId,
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'nullable|email|unique:leads,email,' . $this->leadId,
            'ville' => 'required|string',
            'address' => 'required|string',
            'tele' => 'required|numeric|unique:leads,tele,' . $this->leadId,
            'produit' => 'required|string'
        ]);


        // Execution doesn't reach here if validation fails.
        if ($this->leadId) {
            $lead = lead::findOrFail($this->leadId);
            $lead->update([
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'ville' => $this->ville,
                'address' => $this->address,
                'tele' => $this->tele,
                'produit' => $this->produit,
                //'addedby' => $this->authAdmin->fullName(),
                //'source' => 'direct-admin'

            ]);

            if ($lead) {
                $this->resetIput();
                return redirect()->route('admin.leads');
            }
        }
    }
    public function deleteLead($id)
    {
        if ($id) {
            $lead = lead::findOrFail($id);
            $lead->delete();
            return redirect()->route('admin.leads');
        }
    }

    public function cancel()
    {
        $this->isUpdate = false;
        $this->resetIput();
    }

    /**** private method ***/
    private function resetIput()
    {
        $this->nom = null;
        $this->prenom = null;
        $this->email = null;
        $this->ville = null;
        $this->address = null;
        $this->tele = null;
        $this->produit = null;
    }
}
