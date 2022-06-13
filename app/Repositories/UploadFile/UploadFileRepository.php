<?php


namespace App\Repositories\UploadFile;


use App\Interfaces\UploadFile\UploadFileRepositoryInterface;
use App\Models\File;
use App\Repositories\BaseRepository\BaseRepository;
use Illuminate\Support\Facades\Storage;

class UploadFileRepository extends BaseRepository implements UploadFileRepositoryInterface
{
    public function __construct(File $model)
    {
        parent::__construct($model);
    }

    private function storeFile($file, $data)
    {
        $size = $file->getSize();
        $main_type = $file->getType();
        $name = $file->getClientOriginalName();
        $hash_name = $file->hashName();
        $full_file = $data['path'] . '/' . $hash_name;

        $file->store($data['path']);
        return $this->model->create([
            'name' => $name,
            'size' => $size,
            'file' => $hash_name,
            'path' => $data['path'],
            'full_file' => $full_file,
            'mime_type' => $main_type,
            'file_type' => $data['file_type'],
            'relation_id' => $data['relation_id'],
        ]);
    }

    public function uploadAsName($data, $nameFileNew)
    {
        if ($data['upload_type'] == 'single') {
            $file = \request()->hasFile($data['file']);
            if ($file) {
                Storage::has($data['delete_file']) ? Storage::delete($data['delete_file']) : '';
                \request()->file($data['file'])->storeAs($data['path'], $nameFileNew);
                return true;
            }
        }
    }

    public function upload($data = [])
    {

        if (\request()->hasFile($data['file']) && $data['upload_type'] == 'single') {
            Storage::has($data['delete_file']) ? Storage::delete($data['delete_file']) : '';
            return \request()->file($data['file'])->store($data['path']);
        } elseif (\request()->hasFile($data['file']) && $data['upload_type'] == 'files' && $data['multi_upload'] == null) {

            $file = \request()->file($data['file']);
            return $this->storeFile($file, $data);
        } elseif (\request()->hasFile($data['file']) && $data['upload_type'] == 'files' && $data['multi_upload'] == true) {
            $files = \request()->file($data['file']);

            foreach ($files as $file) {
                $this->storeFile($file, $data);
            }
        }
    }
}
