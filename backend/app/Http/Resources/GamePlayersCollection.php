<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GamePlayersCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'results' => $this->collection->map(function ($data) {
                $DeferenceInTime = Carbon::parse($data->started_at)->diffInRealSeconds($data->submitted_at);
                $DeferenceInTime = CarbonInterval::seconds($DeferenceInTime)->cascade()->forHumans();

                return [
                    'name' => $data->player_first_name . ', '. $data->player_last_name ,
                    'email' => $data->email,
                    'score' => $data->correct_answers,
                    'time' => $DeferenceInTime,
                ];
            })
        ];
    }
}
