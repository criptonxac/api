<?php

namespace App\Http\Resources;

use App\Models\Attribute;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $javob = [
            'quantity'   => $this->quantity,
        ];

        return $this->getAttributes($javob);
    }

    public function getAttributes(array $javob): array
    {
        $attirbutes= json_decode($this->attributes);
        foreach ($attirbutes as $stockAttirbute) {
            $attirbute = Attribute::find($stockAttirbute->attribute_id);

            $value = Value::find($stockAttirbute->value_id);
            $javob[$attirbute->name] = $value->getTranslations('name');
        }

        return $javob;

    }
}
