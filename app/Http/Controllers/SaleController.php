<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Project;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    public function index()
    {
        $apartments = Project::find(Input::get('project_id'))->apartments->pluck('id')->toArray();

        return Sale::with('apartment')->whereIn('apartment_id', $apartments)->get();
    }

    public function show(Sale $sale)
    {
        return $sale;
    }

    public function update(Sale $sale, Request $request)
    {
        $data = array_except($request->sale, ['id', 'apartment_id', 'created_at', 'updated_at', 'original_client_birthdate', 'original_letter_commitment_subsidy_date', 'original_credit_record_date', 'original_judgment_date', 'original_freedom_tax_date', 'original_sign_date', 'original_deliver_date', 'original_sic_format_date']);

        $sale->update($data);

        return $sale->load('apartment');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'apartment_id' => 'required',
            'client_name' => 'required',
            'client_birthdate' => 'required|date'
        ], [
            'apartment_id.required' => 'Elige un departamento',
            'client_name.required'    => 'El campo nombre no puede estar vacío',
            'client_birthdate.required' => 'El campo fecha de nacimiento no puede estar vacío',
            'client_birthdate.date' => 'Selecciona una fecha válida'
        ]);


        if ($validator->fails()) {
            return response(['errors' => true, 'data' => $validator->getMessageBag()->toArray()]);
        }

        //Store the Sale
        $sale = Sale::create($request->all());
        //Update availability apartment
        $apartment = Apartment::find($request->apartment_id);
        $apartment->availability = 'Apartado';
        $apartment->save();

        return $sale->load('apartment');
    }

    public function avaliableApartments($project_id)
    {
        return Apartment::where('project_id', $project_id)->where('availability', true)->orderBy('number')->get()->toJson();
    }

    public function registerNewPregrade(Sale $sale, Request $request)
    {
        $pregrades = $sale->new_pregrade;
        array_push($pregrades, $request->pregrade);
        $sale->new_pregrade = $pregrades;
        $sale->save();

        return 'true';
    }
}
