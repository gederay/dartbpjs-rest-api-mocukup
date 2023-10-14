<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\FaskesResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "transactionId" => $this->transactionId,
            "faskesName" => $this->faskesName,
            "faskesAddress" => $this->faskesAddress,
            "faskesCoordinate" => $this->faskesCoordinate,
            "patientName" => $this->patientName,
            "phoneNumber" => $this->phoneNumber

        ];
    }
}
