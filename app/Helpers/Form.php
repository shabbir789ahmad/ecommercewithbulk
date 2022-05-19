<?php 

namespace App\Helpers;

class Form {

	public static function createEloquent($model, $data) {

		$route = explode('.', \Route::currentRouteName())[0];
		
		try {

			$model::create($data);

			 \App\Helpers\Logger::logActivity(\Route::currentRouteName(),1);

			return redirect()->route($route . ".index")->with('success', $route.' Data Uploaded');
			
		} catch (\Exception $e) {
          
          \App\Helpers\Logger::logActivity(\Route::currentRouteName(),$e);
			return redirect()->route($route . ".index")->with('success', $route.' Failed To Upload ');
			
		}

	}

	public static function updateEloquent($model, $id, $data) {

		$route = explode('.', \Route::currentRouteName())[0];
		
		try {

			$d=$model::findOrFail($id)->update($data);
            
			 \App\Helpers\Logger::logActivity(\Route::currentRouteName(),1);

			return redirect()->route($route . ".index")->with('success', $route.' Data Updated');
			
		} catch (\Exception $e) {
         \App\Helpers\Logger::logActivity(\Route::currentRouteName(),$e);
			return redirect()->back()->withInput()->with('success', ' Failed to Update '.$route);
			
		}

	}
	public static function DeleteEloquent($model, $id) {

		$route = explode('.', \Route::currentRouteName())[0];
		
		try {

			$model::destroy($id);
              
			 \App\Helpers\Logger::logActivity(\Route::currentRouteName(),1);

			return redirect()->route($route . ".index")->with('success', $route.' Deleted ');
			
		} catch (\Exception $e) {
              App\Helpers\Logger::logActivity(\Route::currentRouteName(),$e);
			return redirect()->back()->withInput()->with('success', ' Failed to Delete '.$route);
			
		}

	}

	

}