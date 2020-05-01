<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingController extends Controller
{
    public function index(){
    	$page_name = 'System Settings';
    	$setting = Setting::find(1);
    	$system_name = $setting->value;
        $favicon = Setting::find(2);
        $fav = $favicon->value;
        $front = Setting::find(3);
        $front = $front->value;
        $admin_logo = Setting::find(4);
        $admin = $admin_logo->value;
        $copyright_text = Setting::find(5);
        $copyright = $copyright_text->value;
    	return view('admin.setting.update',compact('page_name','system_name','front','fav','admin','copyright'));
    }

    public function update(Request $request){
        $this->validate($request,[
        'name'=>'required',
        'copyright'=>'required'
        ]);

        $fav_settings = Setting::find(2);
        if($request->file('favicon')){
        @unlink(public_path('/others/'.$fav_settings->value));
        $file = $request->file('favicon');
        $extension = $file->getClientOriginalExtension();
        $favicon = 'favicon.'.$extension;
        $file->move(public_path('/others'),$favicon);
        $fav_settings->value = $favicon;
        $fav_settings->save(); 
    }


    $front_settings = Setting::find(3);
        if($request->file('front_logo')){
        @unlink(public_path('/others/'.$front_settings->value));
        $file = $request->file('front_logo');
        $extension = $file->getClientOriginalExtension();
        $front_logo = 'front_logo.'.$extension;
        $file->move(public_path('/others'),$front_logo);
        $front_settings->value = $front_logo;
        $front_settings->save(); 
    }


    $admin_settings = Setting::find(4);
        if($request->file('admin_logo')){
        @unlink(public_path('/others/'.$admin_settings->value));
        $file = $request->file('admin_logo');
        $extension = $file->getClientOriginalExtension();
        $admin_logo = 'admin_logo.'.$extension;
        $file->move(public_path('/others'),$admin_logo);
        $admin_settings->value = $admin_logo;
        $admin_settings->save(); 
    }

    $sys_settings = Setting::find(1);
    $sys_settings->value = $request->name;
    $sys_settings->save();

    $copy_settings = Setting::find(5);
    $copy_settings->value = $request->copyright;
    $copy_settings->save();

    return redirect()->action('Admin\SettingController@index');
    
    }


 
}
