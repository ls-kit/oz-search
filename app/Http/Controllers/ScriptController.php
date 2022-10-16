<?php

namespace App\Http\Controllers;

use App\Models\Script;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScriptController extends Controller
{
    public function create()
    {
        $script_tag_info = [
            "script_tag" => [
                "event" => "onload",
                "src" => asset('assets/script.js')
            ]
        ];

        $shop = Auth::user();
        $script_tag = $shop->api()->rest('POST', '/admin/api/2022-07/script_tags.json', $script_tag_info)['body']['script_tag']['id'];
        Script::create([
            'user_id' => auth()->user()->id,
            'shopify_scripttag_id' => $script_tag
        ]);

        return redirect()->back()->with('success', 'Script tag created and data inserted successfully!');
    }

    public function update()
    {
        $script_tag_info = [
            "script_tag" => [
                "event" => "onload",
                "src" => asset('assets/script.js')
            ]
        ];

        $shop = Auth::user();
        $script_tag = $shop->api()->rest('POST', '/admin/api/2022-07/script_tags.json', $script_tag_info)['body']['script_tag']['id'];
        Script::where('user_id', auth()->user()->id)->update([
            'shopify_scripttag_id' => $script_tag
        ]);

        return redirect()->back()->with('success', 'Script tag created and data updated successfully!');
    }

    public function destroy()
    {
        $shop = Auth::user();
        $user_script_tag = Script::where('user_id', $shop->id)->first();
        $script_tag = $shop->api()->rest('DELETE', '/admin/api/2022-07/script_tags/' . $user_script_tag->shopify_scripttag_id . '.json')['body'];

        Script::where('user_id', auth()->user()->id)->update([
            'shopify_scripttag_id' => ''
        ]);

        return redirect()->back()->with('success', 'Script tag deleted successfully!');
    }
}
