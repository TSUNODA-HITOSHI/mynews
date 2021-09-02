<?php
//課題4
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model;

class ProfileController extends Controller
{
    //
    public function add()
    {
        dd('test');
        return view('admin.profile.create');
    }



    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
    
    public function create(Request $request)
    {
        return redirect('admin/profile/create');
        
     $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();
      
      
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $profile->image_path = basename($path);
      } else {
          $profile->image_path = null;
      }
      
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      
      $profile->fill($form);
      $profile->save();
      
      return redirect('admin/profile/create');
  }
 }    