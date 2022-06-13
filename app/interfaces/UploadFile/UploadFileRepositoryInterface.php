<?php


namespace App\Interfaces\UploadFile;


interface UploadFileRepositoryInterface
{
    public function upload($data = []);

    public function uploadAsName($data, $nameFileNew);
}
