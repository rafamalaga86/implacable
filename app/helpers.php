<?php

if (!function_exists('image_repo_asset')) {
    function image_repo_asset(string $filename)
    {
        return config('filesystems.images_url') . config('filesystems.disks.ftp.root') . $filename;
    }
}
