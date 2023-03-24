<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class company_controller extends Controller
{

    public function list()
    {

        $company = company::all();

        $data['record'] = '23';
        $data['company'] = $company;

        return view('listcompany', $data);

    }

    public function add()
    {
        return view('addcompany');
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'email'      => 'bail|required|min:5|max:100',
                'name'      => 'bail|required|min:5|max:100',
                'website'      => 'bail|required|min:5|max:100',
               ];
               $this->validate($request, $rules);
       
               $record = new company();

               $record->name = $request->name;
               $record->email = $request->email;
               $record->website = $request->website;

               $image1 = $request->file('src_pic');
               $imagename1 = $image1->getClientOriginalName();
               $record->src_pic = $imagename1;

               //Method 2 in uploading image
               $image1->move(public_path('/imageUpload'), $imagename1);

               $record->save();
               return Redirect::back()->withErrors(['msg' => 'Successfull added']);

            }catch (Exception $e) {
                return Redirect::back()->withErrors(['msg' => 'Error']);
            }
    }

    public function update(Request $request, $id){
        
        try {

            $rules = [
            'email'      => 'bail|required|min:5|max:100',
            'name'      => 'bail|required|min:5|max:100',
            'website'      => 'bail|required|min:5|max:100',
            ];
            $this->validate($request, $rules);

            $record = company::find($id);

            $record->name = $request->name;
            $record->email = $request->email;
            $record->website = $request->website;



            $record->update();
            return redirect('/listcompany/')->withErrors(['msg' => 'update successful']);

        }catch (Exception $e) {
             return Redirect::back()->withErrors(['msg' => 'Error']);
        }

    }


    public function destroy(company $id)
    {
        $id->delete();
        return redirect('/listcompany')->withErrors(['msg' => 'delete successful']);
    }

}
