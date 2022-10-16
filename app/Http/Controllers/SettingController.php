<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function create()
    {
        $themes = Auth::user()->api()->rest('GET', '/admin/api/2022-04/themes.json');    
        $shopThemes = $themes['body']['themes'];
        $searchedThemeRole = "main";
        //search for the right theme id with the main role
        $activeTheme = array_filter(
            $shopThemes->toArray(),
            function ($e) use (&$searchedThemeRole) {
                return $e['role'] == $searchedThemeRole;
            }
        );
        $activeThemeId = $activeTheme[0]['id'];
        $snippet = Storage::disk('local')->get('Laravel 8.php');
        //Snippet to pass to rest api request
        $data = array(
            'asset'=> [
                'key' => 'snippets/ls_newcode.liquid',
                'value' => $snippet
            ]
        );
        Auth::user()->api()->rest('PUT', '/admin/api/2022-04/themes/'.$activeThemeId.'/assets.json', $data);

        return Setting::updateOrCreate([
            'shop_id' => Auth::user()->name,
            'shop_active_theme_id' => $activeThemeId,
            'activated' => true,
        ]) ?  ['message' => 'Theme setup successfully'] : ['message' => 'Theme setup error!'];
    }

    public function destroy()
    {
        $activeTheme = Setting::where('shop_id', Auth::user()->name)->first();
        $activeThemeId = $activeTheme->shop_active_theme_id;

        $data = array(
            'asset'=> [
                'key' => 'snippets/ls_newcode.liquid'
            ]
        );

        Auth::user()->api()->rest('DELETE', '/admin/api/2022-10/themes/' . $activeThemeId . '/assets.json', $data);
        if($activeTheme->delete()) {
            return redirect()->back()->with('success', 'File deleted successfully!');
        }

        return redirect()->back()->with('error', 'File was not deleted!');
    }
}
