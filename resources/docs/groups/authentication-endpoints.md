# Authentication Endpoints


## Register user

This endpoint lets you register a user.




> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/user/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Title":"Prof.","name":"John Doe","email":"johndoe2@kris.com","password":"voluptate","device_name":"Huawei STK-L21"}'

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
    "password": "voluptate",
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
    "password": "voluptate",
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
    -d '{"email":"non","password":"assumenda","device_name":"Huawei STK-L21"}'

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
    "email": "non",
    "password": "assumenda",
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
    "email": "non",
    "password": "assumenda",
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
    -d '{"email":"consequatur"}'

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
    "email": "consequatur"
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
    "email": "consequatur"
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


## Change Password

This endpoint lets you change password.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/user/reset-password" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"tempore","password":"impedit","current_password":"sunt"}'

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
    "email": "tempore",
    "password": "impedit",
    "current_password": "sunt"
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
    "email": "tempore",
    "password": "impedit",
    "current_password": "sunt"
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

This endpoint lets you logout a user.

<small class="badge badge-darkred">requires authentication</small>



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



