<?php

namespace App\Http\Controllers\Admin;

use App\Enums\HttpStatus;
use App\Enums\Property\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AjaxController extends Controller
{
    function uploadFile(Request $request)
    {
        switch ($request->type) {
            case 'image':
                $validateCondition = [
                    'file' => 'bail|required|image|max:10240',
                ];
                break;
            case 'pdf':
                $validateCondition = [
                    'file' => ['bail', 'mimes:pdf'],
                ];
                break;
            default:
                $validateCondition = [
                    'file' => ['bail', 'mimes:jpeg,bmp,png,gif,svg,pdf'],
                ];
        }

        $validator = Validator::make($request->all(), $validateCondition);
        if ($validator->fails()) {
            return response()->json([
                'statusText' => HttpStatus::StatusTextError,
                'message'    => $validator->messages(),
            ], Response::HTTP_OK);
        }

        $file    = $request->file;
        $newName = time().'-'.$file->getClientOriginalName();
        $file->move(Upload::TmpPath, $newName);
        return response()->json([
            'statusText' => HttpStatus::StatusTextSuccess,
            'path'       => $newName,
        ]);
    }

    public function postProfiles(Request $request)
    {
        $userId = Auth::user()->id;
        $this->webLogic->upsertProfiles($request, $userId);
        return redirect()->route('admin.profiles');
    }
}
