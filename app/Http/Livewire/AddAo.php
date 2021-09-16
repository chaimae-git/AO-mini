<?php

namespace App\Http\Livewire;

use App\Models\Ao;
use App\Models\Bu;
use App\Models\Client;
use App\Models\Critere_selection;
use App\Models\Departement;
use App\Models\ministere_de_tuelle;
use App\Models\Pays;
use App\Models\Secteur_activite;
use App\Models\Statut;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddAo extends Component
{
    use WithFileUploads;

    public $successMessage = '';

    public $catchError,$updateMode = false,$photos,$show_table = true,$Parent_id;

    public $currentStep = 1,

        // section_1,
        $num_AO, $date_limite, $pays_id,
        $type_id, $date_adjudication, $ministere_id,
        $secteur_id, $partenariat, $montant_soumission,
        $budget, $n_lot, $client_id, $montant_c_p,
        $critere_selection_id, $objet,
        $cps, $rc,

        //section_2
        $select_partie_administratif, $select_partie_financiaire, $select_partie_technique,

        //partie_3
        $adresse, $name, $location, $nom_location;

    public function render()
    {
        $data = [
            'bus' => Bu::orderBy('nom')->get(),
            'departements' => Departement::orderBy('nom')->get(),
            'secteur_activites' => Secteur_activite::orderBy('secteur')->get(),
            'pays' => Pays::orderBy('pays')->get(),
            'ministere_tuelles' => ministere_de_tuelle::orderBy('ministere')->get(),
            'criteres_selections' => Critere_selection::orderBy('critere')->get(),
            'types' => Type::orderBy('type')->get(),
            'clients' => Client::orderBy('client')->get(),
            'secretaires' => Statut::with('utilisateurs')->join('utilisateurs', 'statuts.id', '=', 'utilisateurs.statut_id')->where('statuts.statut', 'secretaire')->orderBy('utilisateurs.nom_prenom')->get(),
        ];
        return view('livewire.aos.add-ao', $data);
    }

    //firstStepSubmit
    public function firstStepSubmit()
    {
//        $this->validate([
//            'num_AO' => 'required|unique:aos,num_ao',
//            'date_limite' => 'required',
//            'pays_id' => 'required',
//            'type_id' => 'required',
//            'date_adjudication' => 'required',
//            'ministere_id' => 'required',
//            'secteur_id' => 'required',
//            'partenariat' => 'required',
//            'montant_soumission' => 'required|numeric',
//            'budget' => 'required|numeric',
//            'n_lot' => 'required|numeric',
//            'client_id' => 'required',
//            'montant_c_p' => 'required|numeric',
//            'critere_selection_id' => 'required',
//            'objet' => '',
//            'cps' => 'required',
//            'rc' => 'required',
//        ]);

        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {
        $this->validate([
            'select_partie_administratif' => 'required',
            'select_partie_financiaire' => 'required',
            'select_partie_technique' => 'required',
        ]);

        $this->currentStep = 3;
    }

    public function submitForm(){

        try{
            $ao = new Ao();

            $ao->num_AO = $this->num_AO;
            $ao->date_limite = $this->date_limite;
            $ao->pays_id = $this->pays_id;
            $ao->type_id = $this->type_id;
            $ao->date_adjudication = $this->date_adjudication;
            $ao->ministere_id = $this->ministere_id;
            $ao->secteur_id = $this->secteur_id;
            $ao->partenariat = $this->partenariat;
            $ao->montant_soumission = $this->montant_soumission;
            $ao->budget = $this->budget;
            $ao->n_lot = $this->n_lot;
            $ao->client_id = $this->client_id;
            $ao->montant_c_p = $this->montant_c_p;
            $ao->critere_selection_id = $this->critere_selection_id;
            $ao->objet = $this->objet;
            $ao->cps = $this->cps;
            $ao->rc = $this->rc;


            if(!empty($this->rc)){
                $path = 'public/aos/'.$ao->num_AO.'/';
                $name_file = "rc.".$this->rc->extension();
                $this->rc->storeAs($path, $name_file);
                $ao->RC = $path.$name_file;
            }else{
                $ao->RC = '';
            }

            //$ao->RC = (!empty($request->rc))?$request->rc : '';
            if(!empty($this->cps)){
                $path = 'public/aos/'.$ao->num_AO.'/';
                $name_file = "rc.".$this->cps->extension();
                $this->cps->storeAs($path, $name_file);
                $ao->CPS = $path.$name_file;
            }else{
                $ao->CPS = '';
            }
            /**************************/


            /********partie_*******/

            $ao->adresse = (!empty($this->adresse))?$this->adresse : '';
            //$ao->geom = (!empty($request->geom))?$request->geom : '';


            DB::transaction(function() use($ao){
                $ao->save();
                $ao->bus()->sync($this->bus_ids);
                $ao->departements()->sync($this->departements_ids);
                $ao->utilisateurs()->sync($this->utilisateurs_ids);
                $ao->locations()->insert([
                    'nom'=>$this->nom_location,
                    'location'=>$this->location,
                ]);
            });
        }catch(Exception $e){

        }

//        try {
//            $My_Parent = new My_Parent();
//
//            // Father_INPUTS
//            $My_Parent->Email = $this->Email;
//            $My_Parent->Password = Hash::make($this->Password);
//            $My_Parent->Name_Father = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
//            $My_Parent->National_ID_Father = $this->National_ID_Father;
//            $My_Parent->Passport_ID_Father = $this->Passport_ID_Father;
//            $My_Parent->Phone_Father = $this->Phone_Father;
//            $My_Parent->Job_Father = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
//            $My_Parent->Passport_ID_Father = $this->Passport_ID_Father;
//            $My_Parent->Nationality_Father_id = $this->Nationality_Father_id;
//            $My_Parent->Blood_Type_Father_id = $this->Blood_Type_Father_id;
//            $My_Parent->Religion_Father_id = $this->Religion_Father_id;
//            $My_Parent->Address_Father = $this->Address_Father;
//
//            // Mother_INPUTS
//            $My_Parent->Name_Mother = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
//            $My_Parent->National_ID_Mother = $this->National_ID_Mother;
//            $My_Parent->Passport_ID_Mother = $this->Passport_ID_Mother;
//            $My_Parent->Phone_Mother = $this->Phone_Mother;
//            $My_Parent->Job_Mother = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
//            $My_Parent->Passport_ID_Mother = $this->Passport_ID_Mother;
//            $My_Parent->Nationality_Mother_id = $this->Nationality_Mother_id;
//            $My_Parent->Blood_Type_Mother_id = $this->Blood_Type_Mother_id;
//            $My_Parent->Religion_Mother_id = $this->Religion_Mother_id;
//            $My_Parent->Address_Mother = $this->Address_Mother;
//            $My_Parent->save();
//
//            if (!empty($this->photos)){
//                foreach ($this->photos as $photo) {
//                    $photo->storeAs($this->National_ID_Father, $photo->getClientOriginalName(), $disk = 'parent_attachments');
//                    ParentAttachment::create([
//                        'file_name' => $photo->getClientOriginalName(),
//                        'parent_id' => My_Parent::latest()->first()->id,
//                    ]);
//                }
//            }
//            $this->successMessage = trans('messages.success');
//            $this->clearForm();
//            $this->currentStep = 1;
//        }
//
//        catch (\Exception $e) {
//            $this->catchError = $e->getMessage();
//        };

    }


    public function edit($id)
    {
//        $this->show_table = false;
//        $this->updateMode = true;
//        $My_Parent = My_Parent::where('id',$id)->first();
//        $this->Parent_id = $id;
//        $this->Email = $My_Parent->Email;
//        $this->Password = $My_Parent->Password;
//        $this->Name_Father = $My_Parent->getTranslation('Name_Father', 'ar');
//        $this->Name_Father_en = $My_Parent->getTranslation('Name_Father', 'en');
//        $this->Job_Father = $My_Parent->getTranslation('Job_Father', 'ar');;
//        $this->Job_Father_en = $My_Parent->getTranslation('Job_Father', 'en');
//        $this->National_ID_Father =$My_Parent->National_ID_Father;
//        $this->Passport_ID_Father = $My_Parent->Passport_ID_Father;
//        $this->Phone_Father = $My_Parent->Phone_Father;
//        $this->Nationality_Father_id = $My_Parent->Nationality_Father_id;
//        $this->Blood_Type_Father_id = $My_Parent->Blood_Type_Father_id;
//        $this->Address_Father =$My_Parent->Address_Father;
//        $this->Religion_Father_id =$My_Parent->Religion_Father_id;
//
//        $this->Name_Mother = $My_Parent->getTranslation('Name_Mother', 'ar');
//        $this->Name_Mother_en = $My_Parent->getTranslation('Name_Father', 'en');
//        $this->Job_Mother = $My_Parent->getTranslation('Job_Mother', 'ar');;
//        $this->Job_Mother_en = $My_Parent->getTranslation('Job_Mother', 'en');
//        $this->National_ID_Mother =$My_Parent->National_ID_Mother;
//        $this->Passport_ID_Mother = $My_Parent->Passport_ID_Mother;
//        $this->Phone_Mother = $My_Parent->Phone_Mother;
//        $this->Nationality_Mother_id = $My_Parent->Nationality_Mother_id;
//        $this->Blood_Type_Mother_id = $My_Parent->Blood_Type_Mother_id;
//        $this->Address_Mother =$My_Parent->Address_Mother;
//        $this->Religion_Mother_id =$My_Parent->Religion_Mother_id;
    }

    //firstStepSubmit
    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;

    }

    //secondStepSubmit_edit
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;

    }

    public function submitForm_edit(){

        if ($this->Parent_id){
            $parent = My_Parent::find($this->Parent_id);
            $parent->update([
                'Passport_ID_Father' => $this->Passport_ID_Father,
                'National_ID_Father' => $this->National_ID_Father,
            ]);

        }

        return redirect()->to('/add_parent');
    }

    public function delete($id){
        My_Parent::findOrFail($id)->delete();
        return redirect()->to('/add_parent');
    }


    //clearForm
    public function clearForm()
    {
        $this->num_AO = '';
        $this->date_limite = '';
        $this->pays_id = '';
        $this->type_id = '';
        $this->date_adjudication = '';
        $this->ministere_id = '';
        $this->secteur_id ='';
        $this->partenariat = '';
        $this->montant_soumission = '';
        $this->budget = '';
        $this->n_lot = '';
        $this->client_id ='';
        $this->montant_c_p ='';

        $this->critere_selection_id = '';
        $this->objet = '';
        $this->cps = '';
        $this->rc = '';

    }


    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }
}
