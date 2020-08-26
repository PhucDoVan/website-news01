<?php

namespace App\Logic;

use App\Enums\Property\Upload;
use App\Models\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Log;

class WebLogic
{
    public function getDetailProfile($userId)
    {
        return Profile::where('user_id', $userId)->get();
    }

    public function upsertProfiles($parameters, $userId)
    {
        DB::connection('mysql')->beginTransaction();
        try {
        foreach ($parameters['user_profiles_id'] as $key => $profilesId) {
            $proFile = [
                'user_id' => $userId,
                'full_name' => $parameters['user_profiles_full_name'][$key],
                'phone' => $parameters['user_profiles_phone'][$key],
                'facebook' => $parameters['user_profiles_facebook'][$key],
                'google' => $parameters['user_profiles_google'][$key],
                'twitter' => $parameters['user_profiles_twitter'][$key],
            ];
            if ($parameters['user_profiles_image_tmp'][$key]
                && $this->moveImage($parameters['user_profiles_image_tmp'][$key])) {
                $proFile['avatar'] = $parameters['user_profiles_image_tmp'][$key];
            }

            if (!$profilesId && !isset($proFile['avatar'])) {
                continue;
            }

            Profile::updateOrCreate(
                ['id' => data_get($profilesId, 'id')],
                $proFile
            );
        }
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
