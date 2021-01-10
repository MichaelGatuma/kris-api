# Endpoints


## Register user


This endpoint lets you register a user.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/user/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Title":"Prof.","name":"John Doe","email":"johndoe2@kris.com","password":"excepturi","device_name":"Huawei STK-L21"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/user/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "Title": "Prof.",
    "name": "John Doe",
    "email": "johndoe2@kris.com",
    "password": "excepturi",
    "device_name": "Huawei STK-L21"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://127.0.0.1:8000/api/user/register'
payload = {
    "Title": "Prof.",
    "name": "John Doe",
    "email": "johndoe2@kris.com",
    "password": "excepturi",
    "device_name": "Huawei STK-L21"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


> Example response (200, success):

```json
{
    "success": true,
    "auth": {
        "access_token": "92|Sc4fIj5jvY1mrXTlfaK644x65J5ZGozVFhUTGM3h",
        "token_type": "Bearer"
    },
    "user": {
        "Title": "Prof.",
        "email": "johndoe2@kris.com",
        "name": "John Doe",
        "profPic": "",
        "updated_at": "2021-01-07T15:13:54.000000Z",
        "created_at": "2021-01-07T15:13:54.000000Z",
        "id": 99
    },
    "message": "Registration Successful"
}
```
> Example response (400, Another user with this email exists):

```json
{
    "success": false,
    "exception": {
        "code": "VALIDATION_ERROR",
        "message": "The email has already been taken."
    }
}
```
<div id="execution-results-POSTapi-user-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-user-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-register"></code></pre>
</div>
<div id="execution-error-POSTapi-user-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-register"></code></pre>
</div>
<form id="form-POSTapi-user-register" data-method="POST" data-path="api/user/register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-user-register" onclick="tryItOut('POSTapi-user-register');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-user-register" onclick="cancelTryOut('POSTapi-user-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-user-register" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/user/register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>Title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="Title" data-endpoint="POSTapi-user-register" data-component="body" required  hidden>
<br>
The title of the user.</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-user-register" data-component="body" required  hidden>
<br>
The full name of the user.</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-user-register" data-component="body" required  hidden>
<br>
The email of the user.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-user-register" data-component="body" required  hidden>
<br>
The full name of the user.</p>
<p>
<b><code>device_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="device_name" data-endpoint="POSTapi-user-register" data-component="body"  hidden>
<br>
The name of the request source device.</p>

</form>


## Login user


This endpoint lets you login a user.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/user/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"alias","password":"et","device_name":"Huawei STK-L21"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/user/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "alias",
    "password": "et",
    "device_name": "Huawei STK-L21"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://127.0.0.1:8000/api/user/login'
payload = {
    "email": "alias",
    "password": "et",
    "device_name": "Huawei STK-L21"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


> Example response (200, success):

```json
{
    "success": true,
    "auth": {
        "access_token": "94|64rxh2hoJCgakYH61mmRmUukKDFVqKhLT8uYtwCT",
        "token_type": "Bearer"
    },
    "message": "Login Successful"
}
```
> Example response (401, Invalid email or password):

```json
{
    "success": false,
    "message": "Unauthorized"
}
```
<div id="execution-results-POSTapi-user-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-user-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-login"></code></pre>
</div>
<div id="execution-error-POSTapi-user-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-login"></code></pre>
</div>
<form id="form-POSTapi-user-login" data-method="POST" data-path="api/user/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-user-login" onclick="tryItOut('POSTapi-user-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-user-login" onclick="cancelTryOut('POSTapi-user-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-user-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/user/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-user-login" data-component="body" required  hidden>
<br>
The email of the user.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-user-login" data-component="body" required  hidden>
<br>
The password of the user.</p>
<p>
<b><code>device_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="device_name" data-endpoint="POSTapi-user-login" data-component="body" required  hidden>
<br>
The name of the request source device.</p>

</form>


## Forgot_password Reset Request


This endpoint lets you request a password reset email.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/user/forgot-password-request" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"repellendus"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/user/forgot-password-request"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "repellendus"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://127.0.0.1:8000/api/user/forgot-password-request'
payload = {
    "email": "repellendus"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


> Example response (200, success):

```json
{
    "success": true,
    "message": "We have sent instructions to your email for reset password. Please check your inbox."
}
```
> Example response (400, User with the email does not exist/ Email validation failed):

```json
{
    "success": false,
    "exception": {
        "message": "The email must be a valid email address.",
        "code": "VALIDATION_ERROR"
    }
}
```
<div id="execution-results-POSTapi-user-forgot-password-request" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-user-forgot-password-request"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-forgot-password-request"></code></pre>
</div>
<div id="execution-error-POSTapi-user-forgot-password-request" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-forgot-password-request"></code></pre>
</div>
<form id="form-POSTapi-user-forgot-password-request" data-method="POST" data-path="api/user/forgot-password-request" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-forgot-password-request', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-user-forgot-password-request" onclick="tryItOut('POSTapi-user-forgot-password-request');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-user-forgot-password-request" onclick="cancelTryOut('POSTapi-user-forgot-password-request');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-user-forgot-password-request" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/user/forgot-password-request</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-user-forgot-password-request" data-component="body" required  hidden>
<br>
The user email.</p>

</form>


## User Details

<small class="badge badge-darkred">requires authentication</small>

This endpoint lets you login a user.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/user" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/user"
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

url = 'http://127.0.0.1:8000/api/user'
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


## Change Password

<small class="badge badge-darkred">requires authentication</small>

This endpoint lets you change password.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/user/reset-password" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"iure","password":"odio","current_password":"atque"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/user/reset-password"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "iure",
    "password": "odio",
    "current_password": "atque"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://127.0.0.1:8000/api/user/reset-password'
payload = {
    "email": "iure",
    "password": "odio",
    "current_password": "atque"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


> Example response (200, success):

```json
{
    "success": true,
    "message": "Your password has been reset successfully."
}
```
> Example response (401, Another user with this email exists):

```json
{
    "success": false,
    "exception": {
        "code": "INVALID_CREDENTIALS",
        "message": "Your current password is incorrect"
    }
}
```
<div id="execution-results-POSTapi-user-reset-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-user-reset-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-reset-password"></code></pre>
</div>
<div id="execution-error-POSTapi-user-reset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-reset-password"></code></pre>
</div>
<form id="form-POSTapi-user-reset-password" data-method="POST" data-path="api/user/reset-password" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-reset-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-user-reset-password" onclick="tryItOut('POSTapi-user-reset-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-user-reset-password" onclick="cancelTryOut('POSTapi-user-reset-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-user-reset-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/user/reset-password</code></b>
</p>
<p>
<label id="auth-POSTapi-user-reset-password" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-user-reset-password" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-user-reset-password" data-component="body" required  hidden>
<br>
The email of the user.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-user-reset-password" data-component="body" required  hidden>
<br>
The password of the user.</p>
<p>
<b><code>current_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="current_password" data-endpoint="POSTapi-user-reset-password" data-component="body" required  hidden>
<br>
The current password of the user.</p>

</form>


## Logout user

<small class="badge badge-darkred">requires authentication</small>

This endpoint lets you logout a user.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/user/logout" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/user/logout"
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

url = 'http://127.0.0.1:8000/api/user/logout'
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
    "message": "Logged out Successfully."
}
```
<div id="execution-results-POSTapi-user-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-user-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-logout"></code></pre>
</div>
<div id="execution-error-POSTapi-user-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-logout"></code></pre>
</div>
<form id="form-POSTapi-user-logout" data-method="POST" data-path="api/user/logout" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-user-logout" onclick="tryItOut('POSTapi-user-logout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-user-logout" onclick="cancelTryOut('POSTapi-user-logout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-user-logout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/user/logout</code></b>
</p>
<p>
<label id="auth-POSTapi-user-logout" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-user-logout" data-component="header"></label>
</p>
</form>


## Delete user account

<small class="badge badge-darkred">requires authentication</small>

This endpoint lets you delete the user account.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/user/delete-account" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/user/delete-account"
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

url = 'http://127.0.0.1:8000/api/user/delete-account'
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

<small class="badge badge-darkred">requires authentication</small>

This endpoint lets you edit the user details.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/user/profile-details?fields=title%2Cpublished_at%2Cis_public" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Title":"Prof.","name":"John Doe","email":"john@kris.com."}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/user/profile-details"
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

```python
import requests
import json

url = 'http://127.0.0.1:8000/api/user/profile-details'
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

<small class="badge badge-darkred">requires authentication</small>

This endpoint lets you upload a user profile image.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/user/profile-image" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "file=@C:\Users\USER\AppData\Local\Temp\php9313.tmp" 
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/user/profile-image"
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

```python
import requests
import json

url = 'http://127.0.0.1:8000/api/user/profile-image'
files = {
  'file': open('C:\Users\USER\AppData\Local\Temp\php9313.tmp', 'rb')
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


## Search Publications with pagination

<small class="badge badge-darkred">requires authentication</small>

This endpoint return an archive of the publications.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/publications?perPage=9&recent=13&limit=ab" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/publications"
);

let params = {
    "perPage": "9",
    "recent": "13",
    "limit": "ab",
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

url = 'http://127.0.0.1:8000/api/publications'
params = {
  'perPage': '9',
  'recent': '13',
  'limit': 'ab',
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


## Show Publication Details

<small class="badge badge-darkred">requires authentication</small>

This endpoint returns the details of the specified publication by id.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/publication/14" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/publication/14"
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

url = 'http://127.0.0.1:8000/api/publication/14'
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

<small class="badge badge-darkred">requires authentication</small>

This endpoint lets a user request access to a private publication.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/publication/15/request" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/publication/15/request"
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

url = 'http://127.0.0.1:8000/api/publication/15/request'
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

<small class="badge badge-darkred">requires authentication</small>

This endpoint lets a user (publication owner) grant access to a requested private publication.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/publication/3/grant" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/publication/3/grant"
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

url = 'http://127.0.0.1:8000/api/publication/3/grant'
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


## Search Publications with pagination

<small class="badge badge-darkred">requires authentication</small>

This endpoint return an archive of the publications.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/projects?perPage=4&recent=11&limit=eligendi" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/projects"
);

let params = {
    "perPage": "4",
    "recent": "11",
    "limit": "eligendi",
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
  'perPage': '4',
  'recent': '11',
  'limit': 'eligendi',
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


## Show Publication Details

<small class="badge badge-darkred">requires authentication</small>

This endpoint returns the details of the specified publication by id.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/project/17" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/project/17"
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

url = 'http://127.0.0.1:8000/api/project/17'
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
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-project--id-" data-component="url" required  hidden>
<br>
The id of the publication</p>
</form>


## Request Private Research Project

<small class="badge badge-darkred">requires authentication</small>

This endpoint lets a user request access to a private project.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/project/18/request" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/project/18/request"
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

url = 'http://127.0.0.1:8000/api/project/18/request'
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

<small class="badge badge-darkred">requires authentication</small>

This endpoint lets a user(owner) grant access to a private project.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/project/16/grant" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/project/16/grant"
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

url = 'http://127.0.0.1:8000/api/project/16/grant'
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


## Search Publications with pagination

<small class="badge badge-darkred">requires authentication</small>

This endpoint return an archive of the publications.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/researchers?perPage=17&recent=10&limit=ipsam" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/researchers"
);

let params = {
    "perPage": "17",
    "recent": "10",
    "limit": "ipsam",
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

url = 'http://127.0.0.1:8000/api/researchers'
params = {
  'perPage': '17',
  'recent': '10',
  'limit': 'ipsam',
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
<div id="execution-results-GETapi-researchers" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-researchers"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-researchers"></code></pre>
</div>
<div id="execution-error-GETapi-researchers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-researchers"></code></pre>
</div>
<form id="form-GETapi-researchers" data-method="GET" data-path="api/researchers" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-researchers', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-researchers" onclick="tryItOut('GETapi-researchers');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-researchers" onclick="cancelTryOut('GETapi-researchers');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-researchers" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/researchers</code></b>
</p>
<p>
<label id="auth-GETapi-researchers" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-researchers" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>perPage</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="perPage" data-endpoint="GETapi-researchers" data-component="query"  hidden>
<br>
Specify the entries to return in every page. If not specified, the default entries will be returned. Default: 10</p>
<p>
<b><code>recent</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="recent" data-endpoint="GETapi-researchers" data-component="query"  hidden>
<br>
Specify this to show the most recent projects. If not specified, all entries will be returned with pagination. (Overrides 'perPage') Default: 10</p>
<p>
<b><code>limit</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="limit" data-endpoint="GETapi-researchers" data-component="query"  hidden>
<br>
Specify the limit of entries to return. Must be used together with 'recent' If not specified, the default entries will be returned. Default: 10</p>
</form>


## Show Publication Details

<small class="badge badge-darkred">requires authentication</small>

This endpoint returns the details of the specified publication by id.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/researcher/3" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/researcher/3"
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

url = 'http://127.0.0.1:8000/api/researcher/3'
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
<div id="execution-results-GETapi-researcher--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-researcher--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-researcher--id-"></code></pre>
</div>
<div id="execution-error-GETapi-researcher--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-researcher--id-"></code></pre>
</div>
<form id="form-GETapi-researcher--id-" data-method="GET" data-path="api/researcher/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-researcher--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-researcher--id-" onclick="tryItOut('GETapi-researcher--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-researcher--id-" onclick="cancelTryOut('GETapi-researcher--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-researcher--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/researcher/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-researcher--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-researcher--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-researcher--id-" data-component="url" required  hidden>
<br>
The id of the publication</p>
</form>


## Show Researcher&#039;s Active Projects

<small class="badge badge-darkred">requires authentication</small>

This endpoint return the active projects of the authentiated user.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/researcher/activeProjects" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/researcher/activeProjects"
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

url = 'http://127.0.0.1:8000/api/researcher/activeProjects'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
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
<div id="execution-results-GETapi-researcher-activeProjects" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-researcher-activeProjects"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-researcher-activeProjects"></code></pre>
</div>
<div id="execution-error-GETapi-researcher-activeProjects" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-researcher-activeProjects"></code></pre>
</div>
<form id="form-GETapi-researcher-activeProjects" data-method="GET" data-path="api/researcher/activeProjects" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-researcher-activeProjects', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-researcher-activeProjects" onclick="tryItOut('GETapi-researcher-activeProjects');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-researcher-activeProjects" onclick="cancelTryOut('GETapi-researcher-activeProjects');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-researcher-activeProjects" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/researcher/activeProjects</code></b>
</p>
<p>
<label id="auth-GETapi-researcher-activeProjects" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-researcher-activeProjects" data-component="header"></label>
</p>
</form>


## All Discussions

<small class="badge badge-darkred">requires authentication</small>

This endpoint returns an archive of all discussions.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/discussions" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/discussions"
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

url = 'http://127.0.0.1:8000/api/discussions'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-discussions" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-discussions"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-discussions"></code></pre>
</div>
<div id="execution-error-GETapi-discussions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-discussions"></code></pre>
</div>
<form id="form-GETapi-discussions" data-method="GET" data-path="api/discussions" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-discussions', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-discussions" onclick="tryItOut('GETapi-discussions');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-discussions" onclick="cancelTryOut('GETapi-discussions');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-discussions" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/discussions</code></b>
</p>
<p>
<label id="auth-GETapi-discussions" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-discussions" data-component="header"></label>
</p>
</form>


## Create a new Discussion

<small class="badge badge-darkred">requires authentication</small>

This endpoint lets a user publish a discussion/post.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/discussions" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"dolor","body":"labore"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/discussions"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "dolor",
    "body": "labore"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://127.0.0.1:8000/api/discussions'
payload = {
    "title": "dolor",
    "body": "labore"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
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
<div id="execution-results-POSTapi-discussions" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-discussions"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-discussions"></code></pre>
</div>
<div id="execution-error-POSTapi-discussions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-discussions"></code></pre>
</div>
<form id="form-POSTapi-discussions" data-method="POST" data-path="api/discussions" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-discussions', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-discussions" onclick="tryItOut('POSTapi-discussions');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-discussions" onclick="cancelTryOut('POSTapi-discussions');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-discussions" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/discussions</code></b>
</p>
<p>
<label id="auth-POSTapi-discussions" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-discussions" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="title" data-endpoint="POSTapi-discussions" data-component="body" required  hidden>
<br>
The Post Title</p>
<p>
<b><code>body</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="body" data-endpoint="POSTapi-discussions" data-component="body" required  hidden>
<br>
The body title</p>

</form>


## Show Discussion Details

<small class="badge badge-darkred">requires authentication</small>

This endpoint returns the discussion details.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/discussion/{id" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/discussion/{id"
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

url = 'http://127.0.0.1:8000/api/discussion/{id'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
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
<div id="execution-results-GETapi-discussion--id" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-discussion--id"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-discussion--id"></code></pre>
</div>
<div id="execution-error-GETapi-discussion--id" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-discussion--id"></code></pre>
</div>
<form id="form-GETapi-discussion--id" data-method="GET" data-path="api/discussion/{id" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-discussion--id', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-discussion--id" onclick="tryItOut('GETapi-discussion--id');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-discussion--id" onclick="cancelTryOut('GETapi-discussion--id');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-discussion--id" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/discussion/{id</code></b>
</p>
<p>
<label id="auth-GETapi-discussion--id" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-discussion--id" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-discussion--id" data-component="url" required  hidden>
<br>
The id of the specified discussion</p>
</form>



