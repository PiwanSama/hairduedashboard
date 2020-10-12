<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories= ServiceCategory::all();
      return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('categories.create');
    }

    /**
     * Service Category a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

      $service_category = new ServiceCategory;
      $service_category->parent_service_category_id = $request->parent_service_category_id;
      $service_category->sc_name = $request->sc_name;

      if ($request->hasFile('sc_img_url')) {
          $service_category_image = $request->file('sc_img_url');
          $filename = 'img_'.$service_category_image->getClientOriginalName();
          strtolower($filename);
          $service_category_image->move('images/serviceimages/', $filename);

          $service_category->sc_img_url = $filename;
      }

      $service_category->save();
      return redirect('categories')->with('success', 'Service Category added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service Category  $service_category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ServiceCategory::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service Category  $service_category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $service_category = ServiceCategory::find($id);
      return view('categories.edit', compact('service_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service Category  $service_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //Retrieve the service_category
      $service_category = ServiceCategory::where('id', $id)->first();

      if ($service_category != null) {

          // Check if a service_category image has been uploaded
          if ($request->hasFile('sp_id_img')) {
            $service_category_image = $request->file('sc_img_url');
            $filename = 'img_'.$service_category_image->getClientOriginalName();
            strtolower($filename);
            $service_category_image->move('images/serviceimages/', $filename);
  
            $service_category->sc_img_url = $filename;
        }

        $service_category->parent_service_category_id = $request->parent_service_category_id;
        $service_category->sc_name = $request->sc_name;

        $service_category->save();
        return redirect('categories')->with('success', 'Service Category updated successfully!');
    }

    return redirect()->route('categories')->with(['message'=> 'Service Category not found']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service Category  $service_category
     * @return \Illuminate\Http\Response
     */
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
