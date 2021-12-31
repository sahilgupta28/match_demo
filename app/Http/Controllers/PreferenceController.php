<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preference;
use App\Http\Requests\UpdatePreference;
use Auth;

class PreferenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = (new Preference())->getLoginUserPreference();
        return view('preference', compact('data'));
    }

    public function update(UpdatePreference $request)
    {
        $data['annual_income'] = json_encode($request->annual_income);
        $data['occupation'] = json_encode($request->occupation);
        $data['family_type'] = json_encode($request->family_type);
        $data['manglik'] = json_encode($request->manglik);
        Preference::updateOrCreate(['user_id' => Auth::user()->id], $data);
        return redirect()->route('home');
    }
}
