# Publication Endpoints


## Search Publications with pagination

This endpoint return an archive of the publications.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://api.sensenventures.com/api/publications?perPage=20&recent=19&limit=quo" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.sensenventures.com/api/publications"
);

let params = {
    "perPage": "20",
    "recent": "19",
    "limit": "quo",
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.sensenventures.com/api/publications',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'perPage'=> '20',
            'recent'=> '19',
            'limit'=> 'quo',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.sensenventures.com/api/publications'
params = {
  'perPage': '20',
  'recent': '19',
  'limit': 'quo',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (200, http://localhost:8000/api/publication?perPage=2):

```json
{
    "success": true,
    "data": {
        "current_page": 1,
        "data": [
            {
                "Publication_ID": 1,
                "created_at": null,
                "updated_at": null,
                "UserID": 14,
                "Researcher_ID": 13,
                "PublicationTitle": "The Food Security Equation: What is the role of Gender and Social Amenities in this Paradigm? A\r\nFocus on rural households in Yala division, Siaya district, Kenya.",
                "PublicationPath": null,
                "DateOfPublication": "2014-12-08T00:00:00.000000Z",
                "Collaborators": "Prof. Willis Oluoch-Kosura, Mr.Paswel Phiri Marenya",
                "PublicationURL": "https:\/\/www.elsevier.com\/en-xm",
                "Access_Level": null
            },
            {
                "Publication_ID": 2,
                "created_at": null,
                "updated_at": null,
                "UserID": 15,
                "Researcher_ID": 14,
                "PublicationTitle": "FOOD SECURITY IN SEMI-ARID AREAS: AN ANALYSIS OF SOCIO-ECONOMIC AND INSTITUTIONAL FACTORS WITH REFERENCE TO MAKUENI DISTRICT, EASTERN KENYA.",
                "PublicationPath": null,
                "DateOfPublication": "2008-12-09T00:00:00.000000Z",
                "Collaborators": "DR. DOROTHY N. MUTISYA, DR. FRED MUGIVANE, Prof. George Kirhoda,",
                "PublicationURL": "https:\/\/www.elsevier.com\/en-xm",
                "Access_Level": null
            }
        ],
        "first_page_url": "http:\/\/localhost:8000\/api\/publication?page=1",
        "from": 1,
        "last_page": 54,
        "last_page_url": "http:\/\/localhost:8000\/api\/publication?page=54",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http:\/\/localhost:8000\/api\/publication?page=1",
                "label": 1,
                "active": true
            },
            {
                "url": "http:\/\/localhost:8000\/api\/publication?page=2",
                "label": 2,
                "active": false
            },
            {
                "url": "http:\/\/localhost:8000\/api\/publication?page=3",
                "label": 3,
                "active": false
            },
            {
                "url": "http:\/\/localhost:8000\/api\/publication?page=4",
                "label": 4,
                "active": false
            },
            {
                "url": null,
                "label": "...",
                "active": false
            },
            {
                "url": "http:\/\/localhost:8000\/api\/publication?page=53",
                "label": 53,
                "active": false
            },
            {
                "url": "http:\/\/localhost:8000\/api\/publication?page=54",
                "label": 54,
                "active": false
            },
            {
                "url": "http:\/\/localhost:8000\/api\/publication?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": "http:\/\/localhost:8000\/api\/publication?page=2",
        "path": "http:\/\/localhost:8000\/api\/publication",
        "per_page": "2",
        "prev_page_url": null,
        "to": 2,
        "total": 107
    },
    "message": "Publications retrieved successfully"
}
```
> Example response (200, http://localhost:8000/api/publication?recent&amp;limit=2):

```json
{
    "success": true,
    "data": {
        "0": {
            "Publication_ID": 1,
            "created_at": null,
            "updated_at": null,
            "UserID": 14,
            "Researcher_ID": 13,
            "PublicationTitle": "The Food Security Equation: What is the role of Gender and Social Amenities in this Paradigm? A\r\nFocus on rural households in Yala division, Siaya district, Kenya.",
            "PublicationPath": null,
            "DateOfPublication": "2014-12-08T00:00:00.000000Z",
            "Collaborators": "Prof. Willis Oluoch-Kosura, Mr.Paswel Phiri Marenya",
            "PublicationURL": "https:\/\/www.elsevier.com\/en-xm",
            "Access_Level": null
        },
        "39": {
            "Publication_ID": 40,
            "created_at": null,
            "updated_at": null,
            "UserID": 50,
            "Researcher_ID": 49,
            "PublicationTitle": "Corporate governance, accounting and finance: A review",
            "PublicationPath": null,
            "DateOfPublication": "2011-12-08T00:00:00.000000Z",
            "Collaborators": "",
            "PublicationURL": "https:\/\/www.elsevier.com\/en-xm",
            "Access_Level": null
        }
    },
    "message": "Publications retrieved successfully"
}
```
<div id="execution-results-GETapi-publications" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-publications"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-publications"></code></pre>
</div>
<div id="execution-error-GETapi-publications" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-publications"></code></pre>
</div>
<form id="form-GETapi-publications" data-method="GET" data-path="api/publications" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-publications', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-publications" onclick="tryItOut('GETapi-publications');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-publications" onclick="cancelTryOut('GETapi-publications');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-publications" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/publications</code></b>
</p>
<p>
<label id="auth-GETapi-publications" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-publications" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>perPage</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="perPage" data-endpoint="GETapi-publications" data-component="query"  hidden>
<br>
Specify the entries to return in every page. If not specified, the default entries will be returned. Default: 10</p>
<p>
<b><code>recent</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="recent" data-endpoint="GETapi-publications" data-component="query"  hidden>
<br>
Specify this to show the most recent projects. If not specified, all entries will be returned with pagination. (Overrides 'perPage') Default: 10</p>
<p>
<b><code>limit</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="limit" data-endpoint="GETapi-publications" data-component="query"  hidden>
<br>
Specify the limit of entries to return. Must be used together with 'recent' If not specified, the default entries will be returned. Default: 10</p>
</form>


## Deep Search Publications

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://api.sensenventures.com/api/publications/search?institution=aut&researcharea=facere&department=qui&funder=eligendi" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.sensenventures.com/api/publications/search"
);

let params = {
    "institution": "aut",
    "researcharea": "facere",
    "department": "qui",
    "funder": "eligendi",
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.sensenventures.com/api/publications/search',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'institution'=> 'aut',
            'researcharea'=> 'facere',
            'department'=> 'qui',
            'funder'=> 'eligendi',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.sensenventures.com/api/publications/search'
params = {
  'institution': 'aut',
  'researcharea': 'facere',
  'department': 'qui',
  'funder': 'eligendi',
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
        "first_page_url": "http:\/\/localhost\/api\/publications\/search?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/publications\/search?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http:\/\/localhost\/api\/publications\/search?page=1",
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
        "path": "http:\/\/localhost\/api\/publications\/search",
        "per_page": 10,
        "prev_page_url": null,
        "to": null,
        "total": 0
    },
    "message": "Publications retrieved successfully"
}
```
<div id="execution-results-GETapi-publications-search" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-publications-search"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-publications-search"></code></pre>
</div>
<div id="execution-error-GETapi-publications-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-publications-search"></code></pre>
</div>
<form id="form-GETapi-publications-search" data-method="GET" data-path="api/publications/search" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-publications-search', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-publications-search" onclick="tryItOut('GETapi-publications-search');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-publications-search" onclick="cancelTryOut('GETapi-publications-search');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-publications-search" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/publications/search</code></b>
</p>
<p>
<label id="auth-GETapi-publications-search" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-publications-search" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>institution</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="institution" data-endpoint="GETapi-publications-search" data-component="query"  hidden>
<br>
The full institution name</p>
<p>
<b><code>researcharea</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="researcharea" data-endpoint="GETapi-publications-search" data-component="query"  hidden>
<br>
The name of the research area</p>
<p>
<b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="department" data-endpoint="GETapi-publications-search" data-component="query"  hidden>
<br>
The name of the department</p>
<p>
<b><code>funder</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="funder" data-endpoint="GETapi-publications-search" data-component="query"  hidden>
<br>
the funder name</p>
</form>


## Show Publication Details

This endpoint returns the details of the specified publication by id.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://api.sensenventures.com/api/publication/3" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.sensenventures.com/api/publication/3"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.sensenventures.com/api/publication/3',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.sensenventures.com/api/publication/3'
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
"Publication_ID": 1,
"created_at": null,
"updated_at": null,
"UserID": 14,
"Researcher_ID": 13,
"PublicationTitle": "The Food Security Equation: What is the role of Gender and Social Amenities in this Paradigm? A\r\nFocus on rural households in Yala division, Siaya district, Kenya.",
"PublicationPath": null,
"DateOfPublication": "2014-12-08T00:00:00.000000Z",
"Collaborators": "Prof. Willis Oluoch-Kosura, Mr.Paswel Phiri Marenya",
"PublicationURL": "https://www.elsevier.com/en-xm",
"Access_Level": null
},
"message": "Publication retrieved successfully"
}
}
```
<div id="execution-results-GETapi-publication--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-publication--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-publication--id-"></code></pre>
</div>
<div id="execution-error-GETapi-publication--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-publication--id-"></code></pre>
</div>
<form id="form-GETapi-publication--id-" data-method="GET" data-path="api/publication/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-publication--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-publication--id-" onclick="tryItOut('GETapi-publication--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-publication--id-" onclick="cancelTryOut('GETapi-publication--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-publication--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/publication/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-publication--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-publication--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-publication--id-" data-component="url" required  hidden>
<br>
The id of the publication</p>
</form>


## Request Private Publication

This endpoint lets a user request access to a private publication.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://api.sensenventures.com/api/publication/4/request" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.sensenventures.com/api/publication/4/request"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.sensenventures.com/api/publication/4/request',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.sensenventures.com/api/publication/4/request'
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
<div id="execution-results-POSTapi-publication--id--request" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-publication--id--request"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-publication--id--request"></code></pre>
</div>
<div id="execution-error-POSTapi-publication--id--request" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-publication--id--request"></code></pre>
</div>
<form id="form-POSTapi-publication--id--request" data-method="POST" data-path="api/publication/{id}/request" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-publication--id--request', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-publication--id--request" onclick="tryItOut('POSTapi-publication--id--request');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-publication--id--request" onclick="cancelTryOut('POSTapi-publication--id--request');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-publication--id--request" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/publication/{id}/request</code></b>
</p>
<p>
<label id="auth-POSTapi-publication--id--request" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-publication--id--request" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="POSTapi-publication--id--request" data-component="url" required  hidden>
<br>
The id of the publication</p>
</form>


## Grant Access to Private Publication

This endpoint lets a user (publication owner) grant access to a requested private publication.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://api.sensenventures.com/api/publication/18/grant" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.sensenventures.com/api/publication/18/grant"
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

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.sensenventures.com/api/publication/18/grant',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.sensenventures.com/api/publication/18/grant'
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
<div id="execution-results-POSTapi-publication--id--grant" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-publication--id--grant"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-publication--id--grant"></code></pre>
</div>
<div id="execution-error-POSTapi-publication--id--grant" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-publication--id--grant"></code></pre>
</div>
<form id="form-POSTapi-publication--id--grant" data-method="POST" data-path="api/publication/{id}/grant" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-publication--id--grant', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-publication--id--grant" onclick="tryItOut('POSTapi-publication--id--grant');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-publication--id--grant" onclick="cancelTryOut('POSTapi-publication--id--grant');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-publication--id--grant" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/publication/{id}/grant</code></b>
</p>
<p>
<label id="auth-POSTapi-publication--id--grant" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-publication--id--grant" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="POSTapi-publication--id--grant" data-component="url" required  hidden>
<br>
The id of the publication</p>
</form>



