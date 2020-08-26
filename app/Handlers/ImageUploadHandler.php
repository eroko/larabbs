<?php

namespace App\Handlers;

use Illuminate\Support\Str;

class ImageUploadHandler
{
    protected $allowed_ext = ['jpg', 'gif', 'png', 'jpeg'];

    public function save($file, $folder, $file_prefix, $max_width = false)
    {
        $folder_name = "uploads/images/$folder/" . date('Ym/d', time());

        $upload_path = public_path() . '/' . $folder_name;

        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        $file_name = $file_prefix . '_' . time() . '_' . Str::random(1) . '.' . $extension;

        if (!in_array($extension, $this->allowed_ext)) {
            return false;
        }

        $file->move($upload_path, $file_name);

        // Crop Oversized Image
        if ($max_width && $extension != 'gif') {
            $this->reduceSize($upload_path . '/' . $file_name, $max_width);
        }

        return [
            'path' => config('app.url') . "/$folder_name/$file_name"
        ];
    }

    public function reduceSize($file_path, $max_width)
    {
        $image = Image::make($file_path);

        $image->resize($max_width, null, function ($constraint) {
            $constraint->aspectRatio();

            $constraint->upsize();
        });

        $image->save();
    }
}
