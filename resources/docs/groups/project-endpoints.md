# Project Endpoints


## Search Projects with pagination

This endpoint return an archive of the projects.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/projects?perPage=13&recent=3&limit=laboriosam" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/projects"
);

let params = {
    "perPage": "13",
    "recent": "3",
    "limit": "laboriosam",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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

url = 'http://127.0.0.1:8000/api/projects'
params = {
  'perPage': '13',
  'recent': '3',
  'limit': 'laboriosam',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (200, success):

```json

{
"success": true,
"data": {
"current_page": 1,
"data": [
{
"created_at": null,
"updated_at": null,
"ProjectTitle": "A multi-level text clustering algorithm for retrieval of academic research data",
"Project_ID": 1,
"ProjectAbstract": "Lack of or limited access to research data is one of the major challenges facing the academic researchers in Kenyan institutions of higher learning, as well as its research institutes. This \r\nleads to duplication of research, less opportunities for networking, and also contributes to scientific \r\nfraud. Efforts need to be made in order to make academic research data available and accessible\r\n. ",
"Researcher_ID": 1,
"User_ID": 2,
"ProjectResearchAreas": "Information Retrieval",
"ResearchersInvolved": "Damaris Waema, George Okeyo, Petronilla Muriithi",
"Funded": true,
"Funder_ID": 1,
"Status": "Ongoing",
"LinkToPublication": "http://www.jkuat.ac.ke",
"Access_Level": "public",
"projectStart": "2020-11-21",
"projectEnd": "2020-11-21",
"abstractDocumentPath": null,
"otherProjectDocsPath": null,
"RelevantProjectDocuments": null
},
],
"first_page_url": "http://localhost:8000/api/project?page=1",
"from": 1,
"last_page": 50,
"last_page_url": "http://localhost:8000/api/project?page=50",
"links": [
{
"url": null,
"label": "&laquo; Previous",
"active": false
},
{
"url": "http://localhost:8000/api/project?page=1",
"label": 1,
"active": true
},
{
"url": "http://localhost:8000/api/project?page=2",
"label": 2,
"active": false
},
{
"url": "http://localhost:8000/api/project?page=3",
"label": 3,
"active": false
},
{
"url": null,
"label": "...",
"active": false
},
{
"url": "http://localhost:8000/api/project?page=49",
"label": 49,
"active": false
},
{
"url": "http://localhost:8000/api/project?page=50",
"label": 50,
"active": false
},
{
"url": "http://localhost:8000/api/project?page=2",
"label": "Next &raquo;",
"active": false
}
],
"next_page_url": "http://localhost:8000/api/project?page=2",
"path": "http://localhost:8000/api/project",
"per_page": "2",
"prev_page_url": null,
"to": 2,
"total": 100
},
"message": "Projects retrieved successfully"
}
```
<div id="execution-results-GETapi-projects" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-projects"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-projects"></code></pre>
</div>
<div id="execution-error-GETapi-projects" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-projects"></code></pre>
</div>
<form id="form-GETapi-projects" data-method="GET" data-path="api/projects" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-projects', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-projects" onclick="tryItOut('GETapi-projects');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-projects" onclick="cancelTryOut('GETapi-projects');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-projects" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/projects</code></b>
</p>
<p>
<label id="auth-GETapi-projects" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-projects" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>perPage</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="perPage" data-endpoint="GETapi-projects" data-component="query"  hidden>
<br>
Specify the entries to return in every page. If not specified, the default entries will be returned. Default: 10</p>
<p>
<b><code>recent</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="recent" data-endpoint="GETapi-projects" data-component="query"  hidden>
<br>
Specify this to show the most recent projects. If not specified, all entries will be returned with pagination. (Overrides 'perPage') Default: 10</p>
<p>
<b><code>limit</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="limit" data-endpoint="GETapi-projects" data-component="query"  hidden>
<br>
Specify the limit of entries to return. Must be used together with 'recent' If not specified, the default entries will be returned. Default: 10</p>
</form>


## Deep Search Projects

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/projects/search?institution=cumque&researcharea=at&department=non&funder=aut" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/projects/search"
);

let params = {
    "institution": "cumque",
    "researcharea": "at",
    "department": "non",
    "funder": "aut",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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

url = 'http://127.0.0.1:8000/api/projects/search'
params = {
  'institution': 'cumque',
  'researcharea': 'at',
  'department': 'non',
  'funder': 'aut',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (200):

```json
{
    "success": true,
    "data": {
        "current_page": 1,
        "data": [],
        "first_page_url": "http:\/\/localhost\/api\/projects\/search?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/projects\/search?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http:\/\/localhost\/api\/projects\/search?page=1",
                "label": 1,
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/projects\/search",
        "per_page": 10,
        "prev_page_url": null,
        "to": null,
        "total": 0
    },
    "message": "Projects retrieved successfully"
}
```
<div id="execution-results-GETapi-projects-search" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-projects-search"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-projects-search"></code></pre>
</div>
<div id="execution-error-GETapi-projects-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-projects-search"></code></pre>
</div>
<form id="form-GETapi-projects-search" data-method="GET" data-path="api/projects/search" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-projects-search', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-projects-search" onclick="tryItOut('GETapi-projects-search');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-projects-search" onclick="cancelTryOut('GETapi-projects-search');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-projects-search" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/projects/search</code></b>
</p>
<p>
<label id="auth-GETapi-projects-search" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-projects-search" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>institution</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="institution" data-endpoint="GETapi-projects-search" data-component="query"  hidden>
<br>
The full institution name</p>
<p>
<b><code>researcharea</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="researcharea" data-endpoint="GETapi-projects-search" data-component="query"  hidden>
<br>
The name of the research area</p>
<p>
<b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="department" data-endpoint="GETapi-projects-search" data-component="query"  hidden>
<br>
The name of the department</p>
<p>
<b><code>funder</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="funder" data-endpoint="GETapi-projects-search" data-component="query"  hidden>
<br>
the funder name</p>
</form>


## Show Project Details

This endpoint returns the details of the specified project by id.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/project/ipsa" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/project/ipsa"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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

url = 'http://127.0.0.1:8000/api/project/ipsa'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (200, success):

```json

{
{
"success": true,
"data": {
"created_at": null,
"updated_at": null,
"ProjectTitle": "A multi-level text clustering algorithm for retrieval of academic research data",
"Project_ID": 1,
"ProjectAbstract": "Lack of or limited access to research data is one of the major challenges facing the academic researchers in Kenyan institutions of higher learning, as well as its research institutes. This \r\nleads to duplication of research, less opportunities for networking, and also contributes to scientific \r\nfraud. Efforts need to be made in order to make academic research data available and accessible\r\n. ",
"Researcher_ID": 1,
"User_ID": 2,
"ProjectResearchAreas": "Information Retrieval",
"ResearchersInvolved": "Damaris Waema, George Okeyo, Petronilla Muriithi",
"Funded": true,
"Funder_ID": 1,
"Status": "Ongoing",
"LinkToPublication": "http://www.jkuat.ac.ke",
"Access_Level": "public",
"projectStart": "2020-11-21",
"projectEnd": "2020-11-21",
"abstractDocumentPath": null,
"otherProjectDocsPath": null,
"RelevantProjectDocuments": null
},
"message": "Project retrieved successfully"
}
}
```
<div id="execution-results-GETapi-project--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-project--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-project--id-"></code></pre>
</div>
<div id="execution-error-GETapi-project--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-project--id-"></code></pre>
</div>
<form id="form-GETapi-project--id-" data-method="GET" data-path="api/project/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-project--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-project--id-" onclick="tryItOut('GETapi-project--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-project--id-" onclick="cancelTryOut('GETapi-project--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-project--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/project/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-project--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-project--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-project--id-" data-component="url" required  hidden>
<br>
</p>
</form>


## Request Private Research Project

This endpoint lets a user request access to a private project.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/project/2/request" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/project/2/request"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://127.0.0.1:8000/api/project/2/request'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()
```


> Example response (200):

```json
{}
```
> Example response (400):

```json
{}
```
<div id="execution-results-POSTapi-project--id--request" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-project--id--request"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-project--id--request"></code></pre>
</div>
<div id="execution-error-POSTapi-project--id--request" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-project--id--request"></code></pre>
</div>
<form id="form-POSTapi-project--id--request" data-method="POST" data-path="api/project/{id}/request" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-project--id--request', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-project--id--request" onclick="tryItOut('POSTapi-project--id--request');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-project--id--request" onclick="cancelTryOut('POSTapi-project--id--request');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-project--id--request" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/project/{id}/request</code></b>
</p>
<p>
<label id="auth-POSTapi-project--id--request" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-project--id--request" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="POSTapi-project--id--request" data-component="url" required  hidden>
<br>
The id of the project</p>
</form>


## Grant access to a private project

This endpoint lets a user(owner) grant access to a private project.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/project/20/grant" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/project/20/grant"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://127.0.0.1:8000/api/project/20/grant'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()
```


> Example response (200):

```json
{}
```
> Example response (400):

```json
{}
```
<div id="execution-results-POSTapi-project--id--grant" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-project--id--grant"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-project--id--grant"></code></pre>
</div>
<div id="execution-error-POSTapi-project--id--grant" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-project--id--grant"></code></pre>
</div>
<form id="form-POSTapi-project--id--grant" data-method="POST" data-path="api/project/{id}/grant" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-project--id--grant', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-project--id--grant" onclick="tryItOut('POSTapi-project--id--grant');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-project--id--grant" onclick="cancelTryOut('POSTapi-project--id--grant');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-project--id--grant" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/project/{id}/grant</code></b>
</p>
<p>
<label id="auth-POSTapi-project--id--grant" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-project--id--grant" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="POSTapi-project--id--grant" data-component="url" required  hidden>
<br>
The id of the project</p>
</form>



