<?php

namespace App\Http\Controllers\panel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
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

   
    function store(CategoryRequest $request)
    {
        
         $images=[ 'category_image'=>$this->image()];
       
         if($images != null)
         {
            $data=array_merge($request->validated(),$images);
         }else{
            $data=$request->validated();
         }
        
        
         
         return \App\Helpers\Form::createEloquent(new Category, $data);
        
    }

     
     function edit($id)
    {   
    
       $category=Category::findorfail($id);
       return view('Dashboard.category.edit',compact('category'));
    }


    function update(CategoryRequest $request,$id)
    {
      $images='';
       if($request->hasfile('image'))
       {
         $images=[ 'category_image'=>$this->image()];
       }
        
       
         if($images )
         {
            $data=array_merge($request->validated(),$images);
         }else{
            $data=$request->validated();
         }



         return \App\Helpers\Form::updateEloquent(new Category,$id, $data);
    }


    function destroy($id)
    {   
    
      return \App\Helpers\Form::deleteEloquent(new Category,$id);
   }


   

 
}

