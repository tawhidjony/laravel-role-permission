<?php

namespace App\Http\Controllers;


use App\Http\Traits\ResponseMessage;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
class SettingController extends Controller
{

    use ResponseMessage;



    public function edit($id)
    {
        $setting = DB::table('settings')->where('id', $id)->first();
        return view('settings', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'

        ]);

        $data = array();
        $data = $request->all();
        $setting = Setting::find($id);

        if ($setting) {
            $image = $request->file('photo');
            if ($image) {
                $path = Storage::putFile('setting', $request->file('photo'));
                if ($path) {
                    $data['photo'] = $path;
                    if (isset($setting->photo)) {
                        Storage::delete($setting->photo);
                    }
                }
            }

            $image = $request->file('favicon');
            if ($image) {
                $path = Storage::putFile('setting', $request->file('favicon'));
                if ($path) {
                    $data['favicon'] = $path;
                    if (isset($setting->favicon)) {
                        Storage::delete($setting->favicon);
                    }
                }
            }
            $setting->update($data);
            return Redirect()->back()->with($this->create_success_message);
        } else {

            return Redirect()->back()->with($this->create_fail_message);
        }


    }

}
