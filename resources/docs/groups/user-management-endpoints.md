# User Management Endpoints


## User Details

This endpoint lets you login a user.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://api.sensenventures.com/api/user" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.sensenventures.com/api/user"
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
    'http://api.sensenventures.com/api/user',
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

url = 'http://api.sensenventures.com/api/user'
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
    "success": true,
    "data": {
        "id": 84,
        "Title": "",
        "name": "Michael Gates",
        "email": "mgates4410@gmail.com",
        "email_verified_at": null,
        "api_token": null,
        "two_factor_recovery_codes": null,
        "profPic": "storage\/ProfilePictures\/mgates4410@gmail.com.png",
        "isAdmin": true,
        "current_team_id": null,
        "profile_photo_path": null,
        "created_at": "2020-11-24T06:50:33.000000Z",
        "updated_at": "2021-01-06T23:39:58.000000Z",
        "verified_at": null
    },
    "message": "User details retrieved successfully"
}
```
> Example response (400):

```json
{}
```
<div id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</div>
<div id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</div>
<form id="form-GETapi-user" data-method="GET" data-path="api/user" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-user" onclick="tryItOut('GETapi-user');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-user" onclick="cancelTryOut('GETapi-user');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-user" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/user</code></b>
</p>
<p>
<label id="auth-GETapi-user" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-user" data-component="header"></label>
</p>
</form>


## Delete user account

This endpoint lets you delete the user account.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://api.sensenventures.com/api/user/delete-account" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.sensenventures.com/api/user/delete-account"
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
    'http://api.sensenventures.com/api/user/delete-account',
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

url = 'http://api.sensenventures.com/api/user/delete-account'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()
```


> Example response (200, success):

```json
{
    "success": true,
    "message": "Your account has been deleted successfully"
}
```
> Example response (400):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-POSTapi-user-delete-account" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-user-delete-account"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-delete-account"></code></pre>
</div>
<div id="execution-error-POSTapi-user-delete-account" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-delete-account"></code></pre>
</div>
<form id="form-POSTapi-user-delete-account" data-method="POST" data-path="api/user/delete-account" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-delete-account', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-user-delete-account" onclick="tryItOut('POSTapi-user-delete-account');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-user-delete-account" onclick="cancelTryOut('POSTapi-user-delete-account');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-user-delete-account" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/user/delete-account</code></b>
</p>
<p>
<label id="auth-POSTapi-user-delete-account" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-user-delete-account" data-component="header"></label>
</p>
</form>


## Edit user Details

This endpoint lets you edit the user details.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://api.sensenventures.com/api/user/profile-details?fields=title%2Cpublished_at%2Cis_public" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Title":"Prof.","name":"John Doe","email":"john@kris.com."}'

```

```javascript
const url = new URL(
    "http://api.sensenventures.com/api/user/profile-details"
);

let params = {
    "fields": "title,published_at,is_public",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "Title": "Prof.",
    "name": "John Doe",
    "email": "john@kris.com."
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.sensenventures.com/api/user/profile-details',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'fields'=> 'title,published_at,is_public',
        ],
        'json' => [
            'Title' => 'Prof.',
            'name' => 'John Doe',
            'email' => 'john@kris.com.',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.sensenventures.com/api/user/profile-details'
payload = {
    "Title": "Prof.",
    "name": "John Doe",
    "email": "john@kris.com."
}
params = {
  'fields': 'title,published_at,is_public',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload, params=params)
response.json()
```


> Example response (200, success):

```json

{
"success" : "true",
"data" : $user,
"message" : "Your profile has been updates successfully"
}
```
<div id="execution-results-POSTapi-user-profile-details" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-user-profile-details"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-profile-details"></code></pre>
</div>
<div id="execution-error-POSTapi-user-profile-details" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-profile-details"></code></pre>
</div>
<form id="form-POSTapi-user-profile-details" data-method="POST" data-path="api/user/profile-details" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-profile-details', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-user-profile-details" onclick="tryItOut('POSTapi-user-profile-details');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-user-profile-details" onclick="cancelTryOut('POSTapi-user-profile-details');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-user-profile-details" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/user/profile-details</code></b>
</p>
<p>
<label id="auth-POSTapi-user-profile-details" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-user-profile-details" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>fields</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="fields" data-endpoint="POSTapi-user-profile-details" data-component="query" required  hidden>
<br>
Comma-separated list of fields to include in the response.</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>Title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="Title" data-endpoint="POSTapi-user-profile-details" data-component="body" required  hidden>
<br>
The title of the user.</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-user-profile-details" data-component="body" required  hidden>
<br>
The full names of the user.</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-user-profile-details" data-component="body" required  hidden>
<br>
The email of the user.</p>

</form>


## Add user Image

This endpoint lets you upload a user profile image.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://api.sensenventures.com/api/user/profile-image" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "file=@C:\Users\USER\AppData\Local\Temp\php42AA.tmp" 
```

```javascript
const url = new URL(
    "http://api.sensenventures.com/api/user/profile-image"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.sensenventures.com/api/user/profile-image',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' => 'multipart/form-data',
            'Accept' => 'application/json',
        ],
        'multipart' => [
            [
                'name' => 'file',
                'contents' => fopen('C:\Users\USER\AppData\Local\Temp\php42AA.tmp', 'r')
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.sensenventures.com/api/user/profile-image'
files = {
  'file': open('C:\Users\USER\AppData\Local\Temp\php42AA.tmp', 'rb')
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, files=files)
response.json()
```


> Example response (200, success):

```json

{
"success" : true,
"data" : $user,
"message" : "Profile Photo Updated successfully"
}
```
<div id="execution-results-POSTapi-user-profile-image" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-user-profile-image"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-profile-image"></code></pre>
</div>
<div id="execution-error-POSTapi-user-profile-image" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-profile-image"></code></pre>
</div>
<form id="form-POSTapi-user-profile-image" data-method="POST" data-path="api/user/profile-image" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-profile-image', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-user-profile-image" onclick="tryItOut('POSTapi-user-profile-image');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-user-profile-image" onclick="cancelTryOut('POSTapi-user-profile-image');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-user-profile-image" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/user/profile-image</code></b>
</p>
<p>
<label id="auth-POSTapi-user-profile-image" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-user-profile-image" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>file</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
<input type="file" name="file" data-endpoint="POSTapi-user-profile-image" data-component="body" required  hidden>
<br>
The file object to be uploaded</p>

</form>


## Get user Image Url

This endpoint lets you fetch a logged in user profile image or fetch a user image by user id.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://api.sensenventures.com/api/user/profile-image?user_id=12" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.sensenventures.com/api/user/profile-image"
);

let params = {
    "user_id": "12",
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
    'http://api.sensenventures.com/api/user/profile-image',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'user_id'=> '12',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.sensenventures.com/api/user/profile-image'
params = {
  'user_id': '12',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-user-profile-image" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-user-profile-image"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user-profile-image"></code></pre>
</div>
<div id="execution-error-GETapi-user-profile-image" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user-profile-image"></code></pre>
</div>
<form id="form-GETapi-user-profile-image" data-method="GET" data-path="api/user/profile-image" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-user-profile-image', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-user-profile-image" onclick="tryItOut('GETapi-user-profile-image');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-user-profile-image" onclick="cancelTryOut('GETapi-user-profile-image');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-user-profile-image" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/user/profile-image</code></b>
</p>
<p>
<label id="auth-GETapi-user-profile-image" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-user-profile-image" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="user_id" data-endpoint="GETapi-user-profile-image" data-component="query"  hidden>
<br>
The specified user's id</p>
</form>



