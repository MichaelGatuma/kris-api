<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{

    public static $wrap = 'project';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->Project_ID,
            'title' => $this->ProjectTitle,
            'project_abstract' => $this->ProjectAbstract,
            'research_areas' => $this->ProjectResearchAreas,
            'researchers_involved' => $this->ResearchersInvolved,
            'is_funded' => $this->Funded,
            'funder_id' => $this->Funder_ID,
            'status' => $this->Status,
            'publication_url' => $this->LinkToPublication,
            'access_level' => $this->Access_Level,
            'started_at' => $this->projectStart,
            'ended_at' => $this->projectEnd,
            'abstract_document_path' => $this->abstractDocumentPath,
            'other_documents_path' => $this->otherProjectDocsPath,
            'relevant_project_documents' => $this->RelevantProjectDocuments
        ];
    }
}
