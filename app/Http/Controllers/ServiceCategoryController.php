<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceCategoryController extends Controller
{

    public function index()
    {
      $categories= ServiceCategory::all();
      return view('categories.index', compact('categories'));
    }

    public function create()
    {
       return view('categories.create');
    }

    public function store(Request $request, $id)
    {
      $service_category = ServiceCategory::create($request->all());

      if ($request->hasFile('sc_img_url')) {
          $service_category_image = $request->file('sc_img_url');
          $filename = 'img_'.$service_category_image->getClientOriginalName();
          strtolower($filename);
          $service_category_image->move('images/serviceimages/', $filename);
          $service_category->sc_img_url = $filename;

          $service_category->save();
      }

      
      return redirect('categories')->with('success', 'Service Category added successfully!');
    }

    public function show($id)
    {
        return ServiceCategory::findOrFail($id);
    }

    public function edit($id)
    {
      $service_category = ServiceCategory::find($id);
      return view('categories.edit', compact('service_category'));
    }

    public function update(Request $request, $id)
    {
      //Retrieve the service_category
      $service_category = ServiceCategory::where('id', $id)->first();

      if ($service_category != null) {

          $service_category = ServiceCategory::update($request->all());

          // Check if a service_category image has been uploaded
          if ($request->hasFile('sp_id_img')) {
            $service_category_image = $request->file('sc_img_url');
            $filename = 'img_'.$service_category_image->getClientOriginalName();
            strtolower($filename);
            $service_category_image->move('images/serviceimages/', $filename);
  
            $service_category->sc_img_url = $filename;
            $service_category->save();
        }

        return redirect('categories')->with('success', 'Service Category updated successfully!');
    }

    return redirect()->route('categories')->with(['message'=> 'Service Category not found']);
    }
    
    public function destroy($id)
    {
      //Retrieve the service_category
        $service_category = ServiceCategory::where('id', $id)->first();

        if ($service_category != null) {
            $service_category->delete();
            return redirect()->route('categories')->with(['message'=> 'Service Category deleted successfully']);
        }

        return redirect()->route('categories')->with(['message'=> 'Service Category not found']);
      }

}
