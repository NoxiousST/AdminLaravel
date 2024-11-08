<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileUploads
{
    public function handleFile($old, $request, $data, $fileField, $route, $isUpdate = false)
    {
        // If deleting the file, handle the deletion
        if ($isUpdate && $request->has("delete_$fileField") && $request->input("delete_$fileField") == '1') {
            // Delete the file from storage
            if ($old->$fileField) {
                Storage::delete("public/$route/" . $old->$fileField);
                $data[$fileField] = null; // Set field to null to clear the value
            }
        }

        // If a new file is uploaded
        if ($file = $request->file($fileField)) {
            // Delete old file if it exists (for updates only)
            if ($isUpdate && $old->$fileField) {
                Storage::delete("public/$route/" . $old->$fileField);
            }

            // Store the new file
            $data[$fileField] = uniqid() . '_' . $file->getClientOriginalName();
            Storage::put("public/$route/" . $data[$fileField], file_get_contents($file));
        }

        return $data;
    }
}
