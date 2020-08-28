<?php

namespace App\Logic;

use App\Enums\Property\Upload;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class WebLogic
{
    public function getDetailProfile($userId)
    {
        return Profile::where('user_id', $userId)->get();
    }

    public function upsertProfiles($request, $userId)
    {
        $parameters = $request->all();
        DB::connection('mysql')->beginTransaction();
        try {
            $profile = $parameters;
            if ($parameters['user_profiles_image_tmp']
                && $this->moveImage($parameters['user_profiles_image_tmp'])) {
                $profile['avatar'] = $parameters['user_profiles_image_tmp'];
            }

            Profile::updateOrCreate(
                ['user_id' => $userId],
                $profile
            );
            DB::connection('mysql')->commit();
            return true;
        } catch (\Exception $exception) {
            DB::connection('mysql')->rollBack();
            Log::error('WebLogic.upsertProfiles', $exception->getTrace());
            return false;
        }
    }

    public function moveImage($path)
    {
        $oldPath = Upload::TmpPath . $path;
        $newPath = Upload::UploadPath . $path;
        return File::move($oldPath, $newPath);
    }
}
