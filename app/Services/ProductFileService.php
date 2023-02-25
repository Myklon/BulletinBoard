<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductFile;

class ProductFileService
{
    private $fileService;
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function upload($productId, $file)
    {
        return ProductFile::where('product_id', $productId)->create([
            'file_id' => $this->fileService->upload($file)->id,
            'product_id' => $productId
        ]);
    }
}
