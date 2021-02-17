# Endpoints


## api/xxx




> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/xxx" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/xxx"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://127.0.0.1:8000/api/xxx'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (200):

```json
{
    "Researcher_ID": 2,
    "created_at": null,
    "updated_at": null,
    "User_ID": 3,
    "Gender": "Female",
    "DOB": "1993-06-25T00:00:00.000000Z",
    "PhoneNumber": "0721822586",
    "ResearchAreaOfInterest": "Food Security",
    "DepartmentID": 8,
    "ResearchInstitutionID": 3,
    "Affiliation": "Agricultural Engineering (AGEN) - Egerton University",
    "AboutResearcher": "Food security researcher.",
    "Approved": false,
    "CV": "storage\/CVs\/CV1.pdf",
    "ListofPublications": null,
    "projects": [
        {
            "created_at": null,
            "updated_at": null,
            "ProjectTitle": "An investigation to the challenges that Integrated Financial Management Information System(IFMIS) faces.",
            "Project_ID": 7,
            "ProjectAbstract": "Lack of or limited access to research data is one of the major challenges facing the academic researchers in Kenyan institutions of higher learning, as well as its research institutes. This leads to duplication of research, less opportunities for networking, and also contributes to scientific fraud. Efforts need to be made in order to make academic research data available and accessible. ",
            "Researcher_ID": 2,
            "User_ID": 3,
            "ProjectResearchAreas": "Accounting",
            "ResearchersInvolved": "George Okeyo",
            "Funded": true,
            "Funder_ID": 2,
            "Status": "Ongoing",
            "LinkToPublication": "http:\/\/www.jkuat.ac.ke",
            "Access_Level": "public",
            "projectStart": "2020-11-21",
            "projectEnd": "2020-11-21",
            "abstractDocumentPath": null,
            "otherProjectDocsPath": null,
            "RelevantProjectDocuments": null
        },
        {
            "created_at": null,
            "updated_at": null,
            "ProjectTitle": "An investigation to the challenges that Integrated Financial Management Information System(IFMIS) faces.",
            "Project_ID": 8,
            "ProjectAbstract": "Lack of or limited access to research data is one of the major challenges facing the academic researchers in Kenyan institutions of higher learning, as well as its research institutes. This leads to duplication of research, less opportunities for networking, and also contributes to scientific fraud. Efforts need to be made in order to make academic research data available and accessible. ",
            "Researcher_ID": 2,
            "User_ID": 3,
            "ProjectResearchAreas": "Machine Learning",
            "ResearchersInvolved": "George Okeyo",
            "Funded": true,
            "Funder_ID": 2,
            "Status": "Ongoing",
            "LinkToPublication": "http:\/\/www.jkuat.ac.ke",
            "Access_Level": "private",
            "projectStart": "2020-11-21",
            "projectEnd": "2020-11-21",
            "abstractDocumentPath": null,
            "otherProjectDocsPath": null,
            "RelevantProjectDocuments": null
        },
        {
            "created_at": "2020-10-28T11:22:52.000000Z",
            "updated_at": "2020-10-28T11:22:52.000000Z",
            "ProjectTitle": "Test Project",
            "Project_ID": 19,
            "ProjectAbstract": "abstract",
            "Researcher_ID": 2,
            "User_ID": 3,
            "ProjectResearchAreas": "Information Retrieval",
            "ResearchersInvolved": "J.M",
            "Funded": false,
            "Funder_ID": null,
            "Status": "Ongoing",
            "LinkToPublication": "http:\/\/www.jkuat.ac.ke",
            "Access_Level": "private",
            "projectStart": "2020-11-21",
            "projectEnd": "2020-11-21",
            "abstractDocumentPath": null,
            "otherProjectDocsPath": null,
            "RelevantProjectDocuments": null
        },
        {
            "created_at": "2020-10-28T11:34:13.000000Z",
            "updated_at": "2020-10-28T11:34:13.000000Z",
            "ProjectTitle": "Test Project 2",
            "Project_ID": 20,
            "ProjectAbstract": "abstract",
            "Researcher_ID": 2,
            "User_ID": 3,
            "ProjectResearchAreas": "Molecular Biology",
            "ResearchersInvolved": "J.M 2",
            "Funded": false,
            "Funder_ID": null,
            "Status": "Ongoing",
            "LinkToPublication": "http:\/\/www.jkuat.ac.ke",
            "Access_Level": "public",
            "projectStart": "2020-11-21",
            "projectEnd": "2020-11-21",
            "abstractDocumentPath": null,
            "otherProjectDocsPath": null,
            "RelevantProjectDocuments": null
        },
        {
            "created_at": "2020-10-28T16:12:27.000000Z",
            "updated_at": "2020-10-28T16:12:27.000000Z",
            "ProjectTitle": "Test Project 3",
            "Project_ID": 21,
            "ProjectAbstract": "This is an abstract",
            "Researcher_ID": 2,
            "User_ID": 3,
            "ProjectResearchAreas": "Artificial Intelligence",
            "ResearchersInvolved": "Mwenda",
            "Funded": false,
            "Funder_ID": null,
            "Status": "Ongoing",
            "LinkToPublication": "http:\/\/www.jkuat.ac.ke",
            "Access_Level": "private",
            "projectStart": "2020-11-21",
            "projectEnd": "2020-11-21",
            "abstractDocumentPath": null,
            "otherProjectDocsPath": null,
            "RelevantProjectDocuments": null
        },
        {
            "created_at": "2020-10-31T08:50:22.000000Z",
            "updated_at": "2020-10-31T08:50:22.000000Z",
            "ProjectTitle": "Test Project 24",
            "Project_ID": 23,
            "ProjectAbstract": "My abstract",
            "Researcher_ID": 2,
            "User_ID": 3,
            "ProjectResearchAreas": "Information Retrieval",
            "ResearchersInvolved": "Sigey J.K.",
            "Funded": false,
            "Funder_ID": null,
            "Status": "Ongoing",
            "LinkToPublication": "http:\/\/www.jkuat.ac.ke",
            "Access_Level": "private",
            "projectStart": "2020-11-21",
            "projectEnd": "2020-11-21",
            "abstractDocumentPath": null,
            "otherProjectDocsPath": null,
            "RelevantProjectDocuments": null
        },
        {
            "created_at": "2020-11-17T11:22:40.000000Z",
            "updated_at": "2020-11-17T11:22:40.000000Z",
            "ProjectTitle": "New Public Project",
            "Project_ID": 24,
            "ProjectAbstract": "No abstract is abstract too",
            "Researcher_ID": 2,
            "User_ID": 3,
            "ProjectResearchAreas": "Information Retrieval",
            "ResearchersInvolved": "Mwenda",
            "Funded": false,
            "Funder_ID": null,
            "Status": "Ongoing",
            "LinkToPublication": "http:\/\/www.jkuat.ac.ke",
            "Access_Level": "public",
            "projectStart": "2020-11-21",
            "projectEnd": "2020-11-21",
            "abstractDocumentPath": null,
            "otherProjectDocsPath": null,
            "RelevantProjectDocuments": null
        }
    ],
    "publications": []
}
```
<div id="execution-results-GETapi-xxx" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-xxx"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-xxx"></code></pre>
</div>
<div id="execution-error-GETapi-xxx" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-xxx"></code></pre>
</div>
<form id="form-GETapi-xxx" data-method="GET" data-path="api/xxx" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-xxx', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-xxx" onclick="tryItOut('GETapi-xxx');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-xxx" onclick="cancelTryOut('GETapi-xxx');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-xxx" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/xxx</code></b>
</p>
</form>



