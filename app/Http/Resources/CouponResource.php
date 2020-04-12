<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\Null_;

class CouponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->title,
            'link' => $this->link,
            'amount' => $this->amount,
            'code' => $this->code,
            'type' => $this->type,
            'brand' => $this->brand->title ?? null
        ];
    }
}
