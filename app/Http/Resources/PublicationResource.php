<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PublicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->Publication_ID,
            'title' => $this->PublicationTitle,
            'publication_path' => $this->PublicationPath,
            'publication_url' => $this->PublicationURL,
            'publication_date' => $this->DateOfPublication,
            'collaborators' => $this->Collaborators,
            'access_level' => $this->Access_Level
        ];
    }
}
