<?php

namespace Application\Libs;

use Application\Libs\UploadMaster;

class Upload
{
    public static function process($file, $folder)
    {

        $handle = new UploadMaster($file);
        $handle->file_new_name_body = uniqid();
        if ($handle->uploaded) {
            $handle->process(ROOTPATHRESOURCE . '/' . $folder . '/');
            if ($handle->processed) {
                $handle->clean();
            } else {
                return $handle->error;
            }
        }
        return $handle->file_dst_name;
    }


    public static function fncProccesCustomName($file, $folder, $sCustomName = '')
    {

        $handle = new UploadMaster($file);
        $aryPathInfo = pathinfo($file['name']);
        $handle->file_new_name_body =  $aryPathInfo['filename'] . $sCustomName ;
        if ($handle->uploaded) {
            $handle->process(ROOTPATHRESOURCE . '/' . $folder . '/');
            if ($handle->processed) {
                $handle->clean();
            } else {
                return $handle->error;
            }
        }
        return $handle->file_dst_name;
    }
}
