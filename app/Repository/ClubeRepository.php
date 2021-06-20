<?php

namespace App\Repository;

use Storage;
use URL;
use App\Models\Clube;

class ClubeRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Clube;
    }

    private function rootUrl()
    {
        return env('APP_URL');
    }

    public function storeFile($file)
    {
        $fileName = $file->hashName();
        $file->storeAs('escudos', $fileName, 'public');
        return $this->rootUrl() . '/storage/escudos/' . $fileName;
    }

    public function deleteFile($fileUrl)
    {
        $filePath = str_replace($this->rootUrl() . '/storage/', '', $fileUrl);
        if (!Storage::disk('public')->exists($filePath)) return;
        Storage::disk('public')->delete($filePath);
    }
}
