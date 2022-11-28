<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
// use Session;

class ColorController extends Controller
{
	//add color page
    public function add_color()
    {
        $color = Color::orderBy('id', 'DESC')->get();
    	return view('color.add_color', compact('color'));
    }

    //save company info
    public function save_color(Request $request)
    {
    	
        // return $request; exit();
    	// $company_logo = $request->file('company_logo');


    	// $name_generator  = hexdec(uniqid());
    	// $image_extension = strtolower($company_logo->getClientOriginalExtension());
    	// $image_name      = $name_generator.'.'.$image_extension;
    	// $up_location     = 'images/company/';
    	// $last_image      = $up_location.$image_name;

    	// $company_logo->move($up_location,$image_name);

    	$color = new Color;

    	$color->color_name          = $request->color_name;
        $color->color_description   = $request->color_description;
        
    	
    	$color->save();

    	// Session::flash('success', 'Send Successful!');

    	return back();
    }

    // public function manage_company()
    // {
    // 	// echo 'hello'; exit();
    // 	$row = Company::orderBy('id', 'DESC')->first();
                   
                    
    // 	return view('backend.company', compact('row'));
    // }

    //edit company info
    public function edit_color($id)
    {

        // echo "string"; exit();
        $row = Color::orderBy('id', 'DESC')
                    ->where('id', $id)
                    ->first();

        return view('color.edit_color', compact('row'));
    }


      //company update to database
    public function update_color(Request $request)
    {

       

       


        // $company_logo_old = $request->company_logo_old;

        // $company_logo = $request->file('company_logo');


        // if($company_logo)
        // {
        //     $name_generator  = hexdec(uniqid());
        //     $image_extension = strtolower($company_logo->getClientOriginalExtension());
        //     $image_name      = $name_generator.'.'.$image_extension;
        //     $up_location     = 'images/company/';
        //     $last_image      = $up_location.$image_name;

            

        //     $company_logo->move($up_location,$image_name);

            
        //     unlink($company_logo_old);

            $color = Color::find($request->id);

            

	    	$color->color_name          = $request->color_name;
	        $color->color_description   = $request->color_description;
	        
	    	
	    	$color->save();
      

       

        // Session::flash('success', 'Update Successful!');

        return redirect('add-color');
    }

    //delete company
    public function delete_color($id)
    {
    	$color = Color::find($id);
    	$color->delete();

    	// Session::flash('success', 'Delete Successful!');

    	return back();
    }    
}
