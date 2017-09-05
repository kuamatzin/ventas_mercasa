<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Input;

class ApartmentController extends Controller
{
    public function index()
    {
        $availability = Input::get('availability');
        if ($availability == '0') {
            return Project::find(Input::get('project_id'))->apartments;
        }
        elseif ($availability == '1') {
            return Project::find(Input::get('project_id'))->apartments->where('availability', 'Disponible');
        }

        return Project::find(Input::get('project_id'))->apartments->where('availability', 'Apartado');

    }

    public function update(Apartment $apartment, Request $request)
    {
        $data = array_except($request->apartment, ['id', 'project_id', 'created_at', 'updated_at', 'credit_type_formated']);
        $apartment->update($data);

        return "true";
    }

    public function store(Request $request)
    {
        $apartment = Apartment::create($request->all());

        return $apartment;
    }
}
