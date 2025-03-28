<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageUploadTrait
{
    /**
     * Upload an image and store it in the specified directory.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory
     * @return string|null
     */
    public function uploadImage($file, $directory = 'uploads')
    {
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $filePath = $directory . '/' . $fileName;
        Storage::disk('public')->put($filePath, file_get_contents($file));
        return $filePath;
    }

    /**
     * Delete an image from storage.
     *
     * @param string $filePath
     * @return bool
     */
    public function deleteImage($filePath)
    {
        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->delete($filePath);
        }
        return false;
    }

    /**
     * Update an image by deleting the old one and uploading a new one.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string|null $oldFilePath
     * @param string $directory
     * @return string|null
     */
    public function updateImage($file, $oldFilePath = null, $directory = 'uploads')
    {
        if ($oldFilePath) {
            $this->deleteImage($oldFilePath);
        }
        return $this->uploadImage($file, $directory);
    }
}
