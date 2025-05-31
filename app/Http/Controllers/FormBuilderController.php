<?php

namespace App\Http\Controllers;

use App\Models\FormBuilder;
use App\Models\Countries;
use Illuminate\Http\Request;

class FormBuilderController extends Controller
{
    //
    public function index()
    {
        $forms = FormBuilder::with('country')->get();
    
        
        return view('FormBuilder.index', compact('forms'));
    }
        public function createForm()
    {
        $forms = FormBuilder::all();
             $countries = Countries::all();
    
        
        return view('FormBuilder.create', compact('forms','countries'));
    }


    public function create(Request $request)
    {
        $item = new FormBuilder();
        $item->name = $request->name;
          $item->country_id = $request->country_id;
        $item->content = $request->form;
        $item->save();

        return response()->json('added successfully');
    }

    public function editData(Request $request)
    {

       $formBuilder = FormBuilder::where('id', $request->id)->with('country')->first();
        // 2. Get a list of all countries
        $allCountries = Countries::all();
        return response()->json([
            'formBuilder' => $formBuilder, // This will include the loaded 'country'
            'allCountries' => $allCountries
        ]);
       
    }

    public function update(Request $request)
    {
        $item = FormBuilder::findOrFail($request->id);
        $item->name = $request->name;
        $item->content = $request->form;
        $item->country_id=$request->country_id;
        $item->update();
        return response()->json('updated successfully');
    }

    public function destroy($id)
    {
        $form = FormBuilder::findOrFail($id);
        $form->delete();

        return redirect('form-builder')->with('success', 'Form deleted successfully');
    }
}
