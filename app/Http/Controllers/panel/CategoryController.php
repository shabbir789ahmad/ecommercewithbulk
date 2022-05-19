<?php

namespace App\Http\Controllers\panel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Dropdown;
use App\Models\Submenue;
use App\Http\Traits\ImageTrait;
use App\Http\Traits\CategoryTrait;
class CategoryController extends Controller
{
    use CategoryTrait;
    use ImageTrait;

    function index()
    {   
       $categories=$this->categories();
         
       return view('Dashboard.category.index',compact('categories'));
    }
    

    function create()
    {   
       return view('Dashboard.category.create');
    }

   
    function store(Request $request)
    {
        $request->validate([
         'category'=>'required',
         
        ]);

        $data=[
           
            'category'=>$request->category,
            'category_image'=>$this->image(),
        ];

         return \App\Helpers\Form::createEloquent(new Category, $data);
        
    }

     
     function edit($id)
    {   
    
       $category=Category::findorfail($id);
       return view('Dashboard.category.edit',compact('category'));
    }


    function update(Request $request,$id)
    {
      $request->validate([
         'category'=>'required',
         
        ]);

       if($request->hasfile('image'))
         {
            $data=[
           
            'category'=>$request->category,
            'category_image'=>$this->image(),
         ];
         }else{
            $data=[
           
            'category'=>$request->category,
         ];
         }

         return \App\Helpers\Form::updateEloquent(new Category,$id, $data);
    }


    function destroy($id)
    {   
    
      return \App\Helpers\Form::deleteEloquent(new Category,$id);
   }


   

 
}

