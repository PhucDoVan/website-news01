<?php

namespace App\Http\Controllers\Admin;

use App\Logic\WebLogic;
use App\Models\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public $webLogic = null;

    public function __construct(WebLogic $webLogic)
    {
        $this->webLogic = $webLogic;
    }

    public function getProfiles(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $profiles = $user->profiles()->get();
        if (!$profiles) {
            abort(Response::HTTP_NOT_FOUND);
        }
        return view('admin.profiles.index', [
            'profiles' => $profiles
        ]);
    }

    public function postProfiles(Request $request)
    {
        $userId = Auth::user()->id;
        $this->webLogic->upsertProfiles($request, $userId);
        return redirect()->route('admin.profiles');
    }
}
