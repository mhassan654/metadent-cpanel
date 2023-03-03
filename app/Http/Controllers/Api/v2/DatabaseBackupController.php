<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Storage;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;

class DatabaseBackupController extends BaseController
{
    public function getBackupFiles()
    {
        $disk = Storage::disk('azure');

        $blobClient = BlobRestProxy::createBlobService(env('AZURE_STORAGE_CONNECTION_STRING'));
        $listBlobsOptions = new ListBlobsOptions();
        $listBlobsOptions->setPrefix("bk");

        $backupList = [];

        do {
            $result = $blobClient->listBlobs('backups');

            foreach ($result->getBlobs() as $blob) {
                $data['file_name'] = $blob->getName();
                // $data['created_at'] = $blob->getProperties();
                $data['metadata'] = $this->getBlobData($blob);
                $backupList[] = $data;
            }

            $listBlobsOptions->setContinuationToken($result->getContinuationToken());
        } while ($result->getContinuationToken());

        return $this->customSuccessResponseWithPayload($backupList);
    }

    public function downloadBackFile($fileName)
    {
        $disk = Storage::disk('azure');
       return $disk->download('backups/' . $fileName);
    }

    private function getBlobData($blob)
    {
        $blobClient = BlobRestProxy::createBlobService(env('AZURE_STORAGE_CONNECTION_STRING'));
        $result = $blobClient->getBlobMetadata('backups',$blob->getName());
        $retMetadata = $result->getMetadata();

        $blob_metadata = [];
        foreach ($retMetadata as $key => $value) {
            $results['key'] = $key;
            $results['value'] = $value;
            // echo $key . ': ' . $value . PHP_EOL;
            $blob_metadata[] = $results;
        }

        return $blob_metadata;

    }
}
