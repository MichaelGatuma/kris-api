<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>KRIS Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/style.css") }}" media="screen" />
        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/print.css") }}" media="print" />
        <script src="{{ asset("vendor/scribe/js/all.js") }}"></script>

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/highlight-darcula.css") }}" media="" />
        <script src="{{ asset("vendor/scribe/js/highlight.pack.js") }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</head>

<body class="" data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;python&quot;]">
<a href="#" id="nav-button">
      <span>
        NAV
            <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="-image" class=""/>
      </span>
</a>
<div class="tocify-wrapper">
                <div class="lang-selector">
                            <a href="#" data-language-name="bash">bash</a>
                            <a href="#" data-language-name="javascript">javascript</a>
                            <a href="#" data-language-name="python">python</a>
                    </div>
        <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>

    <ul id="toc">
    </ul>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}" target="_blank">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}" target="_blank">View OpenAPI (Swagger) spec</a></li>
                            <li><!--<a href='http://github.com/knuckleswtf/scribe'>Documentation powered by Scribe ✍</a>--></li>
                    </ul>
            <ul class="toc-footer" id="last-updated">
            <li>Last updated: January 7 2021</li>
        </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1>Introduction</h1>
<p>This documentation aims to provide all the information you need to work with KRIS API.
The API was made available to serve as the backend for the KRIS mobile application and is subject to changes in the future.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
<script>
    var baseUrl = "http://127.0.0.1:8000";
</script>
<script src="{{ asset("vendor/scribe/js/tryitout-2.4.2.js") }}"></script>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://127.0.0.1:8000</code></pre><h1>Authenticating requests</h1>
<p>Authenticate requests to this API's endpoints by sending an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p><h1>Endpoints</h1>
<h2>Register user</h2>
<p>This endpoint lets you register a user.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/user/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Title":"Prof.","name":"John Doe","email":"johndoe2@kris.com","password":"qui","device_name":"Huawei STK-L21"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    "password": "qui",
    "device_name": "Huawei STK-L21"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/user/register'
payload = {
    "Title": "Prof.",
    "name": "John Doe",
    "email": "johndoe2@kris.com",
    "password": "qui",
    "device_name": "Huawei STK-L21"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre>
<blockquote>
<p>Example response (200, success):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (400, Another user with this email exists):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "exception": {
        "code": "VALIDATION_ERROR",
        "message": "The email has already been taken."
    }
}</code></pre>
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
<h2>Login user</h2>
<p>This endpoint lets you login a user.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/user/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"numquam","password":"similique","device_name":"Huawei STK-L21"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/user/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "numquam",
    "password": "similique",
    "device_name": "Huawei STK-L21"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/user/login'
payload = {
    "email": "numquam",
    "password": "similique",
    "device_name": "Huawei STK-L21"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre>
<blockquote>
<p>Example response (200, success):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "auth": {
        "access_token": "94|64rxh2hoJCgakYH61mmRmUukKDFVqKhLT8uYtwCT",
        "token_type": "Bearer"
    },
    "message": "Login Successful"
}</code></pre>
<blockquote>
<p>Example response (401, Invalid email or password):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Unauthorized"
}</code></pre>
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
<h2>Forgot_password Reset Request</h2>
<p>This endpoint lets you request a password reset email.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/user/forgot-password-request" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"minus"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/user/forgot-password-request"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "minus"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/user/forgot-password-request'
payload = {
    "email": "minus"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre>
<blockquote>
<p>Example response (200, success):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "We have sent instructions to your email for reset password. Please check your inbox."
}</code></pre>
<blockquote>
<p>Example response (400, User with the email does not exist/ Email validation failed):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "exception": {
        "message": "The email must be a valid email address.",
        "code": "VALIDATION_ERROR"
    }
}</code></pre>
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
<h2>User Details</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This endpoint lets you login a user.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/user" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/user'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200, success):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (400, Another user with this email exists):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
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
<h2>Change Password</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This endpoint lets you change password.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/user/reset-password" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"nesciunt","password":"voluptatem","current_password":"veritatis"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/user/reset-password"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "nesciunt",
    "password": "voluptatem",
    "current_password": "veritatis"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/user/reset-password'
payload = {
    "email": "nesciunt",
    "password": "voluptatem",
    "current_password": "veritatis"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre>
<blockquote>
<p>Example response (200, success):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Your password has been reset successfully."
}</code></pre>
<blockquote>
<p>Example response (401, Another user with this email exists):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "exception": {
        "code": "INVALID_CREDENTIALS",
        "message": "Your current password is incorrect"
    }
}</code></pre>
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
<h2>Logout user</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This endpoint lets you logout a user.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/user/logout" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/user/logout'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200, success):</p>
</blockquote>
<pre><code class="language-json">
{
"success" =&gt; true,
"message" =&gt; "Logged out Successfully."
}</code></pre>
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
<h2>Delete user account</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This endpoint lets you delete the user account.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/user/delete-account" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/user/delete-account'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200, success):</p>
</blockquote>
<pre><code class="language-json">
{
"success" =&gt; true,
"message" =&gt; "Your account has been deleted successfully"
}</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>Edit user Details</h2>
<p>This endpoint lets you edit the user details.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/user/profile-details?fields=title%2Cpublished_at%2Cis_public" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Title":"Prof.","name":"John Doe","email":"john@kris.com."}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/user/profile-details"
);

let params = {
    "fields": "title,published_at,is_public",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
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
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload, params=params)
response.json()</code></pre>
<blockquote>
<p>Example response (200, success):</p>
</blockquote>
<pre><code class="language-json">
{
"success" =&gt; "true", "data" =&gt; $user, "message" =&gt; "Your profile has been updates successfully"
}</code></pre>
<div id="execution-results-POSTapi-user-profile-details" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-user-profile-details"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-profile-details"></code></pre>
</div>
<div id="execution-error-POSTapi-user-profile-details" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-profile-details"></code></pre>
</div>
<form id="form-POSTapi-user-profile-details" data-method="POST" data-path="api/user/profile-details" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-profile-details', this);">
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
<h2>Add user Image</h2>
<p>This endpoint lets you upload a user profile image.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/user/profile-image" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "file=@C:\Users\USER\AppData\Local\Temp\phpD164.tmp" </code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/user/profile-image"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/user/profile-image'
files = {
  'file': open('C:\Users\USER\AppData\Local\Temp\phpD164.tmp', 'rb')
}
headers = {
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, files=files)
response.json()</code></pre>
<blockquote>
<p>Example response (200, success):</p>
</blockquote>
<pre><code class="language-json">
{
"success" =&gt; true, "data" =&gt; $user, "message" =&gt; "Profile Photo Updated successfully"
}</code></pre>
<div id="execution-results-POSTapi-user-profile-image" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-user-profile-image"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-profile-image"></code></pre>
</div>
<div id="execution-error-POSTapi-user-profile-image" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-profile-image"></code></pre>
</div>
<form id="form-POSTapi-user-profile-image" data-method="POST" data-path="api/user/profile-image" data-authed="0" data-hasfiles="1" data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-profile-image', this);">
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
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>file</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
<input type="file" name="file" data-endpoint="POSTapi-user-profile-image" data-component="body" required  hidden>
<br>
The file object to be uploaded</p>

</form>
<h2>Search Publications with pagination</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This endpoint return an archive of the publications.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/publications?perPage=15&amp;recent=15&amp;limit=modi" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/publications"
);

let params = {
    "perPage": "15",
    "recent": "15",
    "limit": "modi",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/publications'
params = {
  'perPage': '15',
  'recent': '15',
  'limit': 'modi',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<blockquote>
<p>Example response (200, <a href="http://localhost:8000/api/publication?perPage=2">http://localhost:8000/api/publication?perPage=2</a>):</p>
</blockquote>
<pre><code class="language-json">{
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
                "label": "&amp;laquo; Previous",
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
                "label": "Next &amp;raquo;",
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
}</code></pre>
<blockquote>
<p>Example response (200, <a href="http://localhost:8000/api/publication?recent&amp;amp;limit=2">http://localhost:8000/api/publication?recent&amp;amp;limit=2</a>):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
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
<h2>Show Publication Details</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This endpoint returns the details of the specified publication by id.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/publication/aut" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/publication/aut"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/publication/aut'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200, success):</p>
</blockquote>
<pre><code class="language-json">
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
}</code></pre>
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
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-publication--id-" data-component="url" required  hidden>
<br>
</p>
</form>
<h2>api/publication/{id}/request</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/publication/facere/request" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/publication/facere/request"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/publication/facere/request'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<div id="execution-results-POSTapi-publication--id--request" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-publication--id--request"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-publication--id--request"></code></pre>
</div>
<div id="execution-error-POSTapi-publication--id--request" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-publication--id--request"></code></pre>
</div>
<form id="form-POSTapi-publication--id--request" data-method="POST" data-path="api/publication/{id}/request" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-publication--id--request', this);">
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
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-publication--id--request" data-component="url" required  hidden>
<br>
</p>
</form>
<h2>api/publication/{id}/grant</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/publication/cum/grant" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/publication/cum/grant"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/publication/cum/grant'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<div id="execution-results-POSTapi-publication--id--grant" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-publication--id--grant"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-publication--id--grant"></code></pre>
</div>
<div id="execution-error-POSTapi-publication--id--grant" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-publication--id--grant"></code></pre>
</div>
<form id="form-POSTapi-publication--id--grant" data-method="POST" data-path="api/publication/{id}/grant" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-publication--id--grant', this);">
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
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-publication--id--grant" data-component="url" required  hidden>
<br>
</p>
</form>
<h2>Search Publications with pagination</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This endpoint return an archive of the publications.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/projects?perPage=11&amp;recent=19&amp;limit=maiores" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/projects"
);

let params = {
    "perPage": "11",
    "recent": "19",
    "limit": "maiores",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/projects'
params = {
  'perPage': '11',
  'recent': '19',
  'limit': 'maiores',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<blockquote>
<p>Example response (200, <a href="http://localhost:8000/api/publication?perPage=2">http://localhost:8000/api/publication?perPage=2</a>):</p>
</blockquote>
<pre><code class="language-json">{
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
                "label": "&amp;laquo; Previous",
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
                "label": "Next &amp;raquo;",
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
}</code></pre>
<blockquote>
<p>Example response (200, <a href="http://localhost:8000/api/publication?recent&amp;amp;limit=2">http://localhost:8000/api/publication?recent&amp;amp;limit=2</a>):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
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
<h2>Show Publication Details</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This endpoint returns the details of the specified publication by id.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/project/velit" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/project/velit"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/project/velit'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200, success):</p>
</blockquote>
<pre><code class="language-json">
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
}</code></pre>
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
<h2>api/project/{id}/request</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/project/distinctio/request" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/project/distinctio/request"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/project/distinctio/request'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<div id="execution-results-POSTapi-project--id--request" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-project--id--request"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-project--id--request"></code></pre>
</div>
<div id="execution-error-POSTapi-project--id--request" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-project--id--request"></code></pre>
</div>
<form id="form-POSTapi-project--id--request" data-method="POST" data-path="api/project/{id}/request" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-project--id--request', this);">
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
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-project--id--request" data-component="url" required  hidden>
<br>
</p>
</form>
<h2>api/project/{id}/grant</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/project/perferendis/grant" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/project/perferendis/grant"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/project/perferendis/grant'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<div id="execution-results-POSTapi-project--id--grant" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-project--id--grant"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-project--id--grant"></code></pre>
</div>
<div id="execution-error-POSTapi-project--id--grant" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-project--id--grant"></code></pre>
</div>
<form id="form-POSTapi-project--id--grant" data-method="POST" data-path="api/project/{id}/grant" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-project--id--grant', this);">
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
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-project--id--grant" data-component="url" required  hidden>
<br>
</p>
</form>
<h2>Search Publications with pagination</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This endpoint return an archive of the publications.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/researchers?perPage=19&amp;recent=4&amp;limit=dolorem" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/researchers"
);

let params = {
    "perPage": "19",
    "recent": "4",
    "limit": "dolorem",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/researchers'
params = {
  'perPage': '19',
  'recent': '4',
  'limit': 'dolorem',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<blockquote>
<p>Example response (200, <a href="http://localhost:8000/api/publication?perPage=2">http://localhost:8000/api/publication?perPage=2</a>):</p>
</blockquote>
<pre><code class="language-json">{
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
                "label": "&amp;laquo; Previous",
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
                "label": "Next &amp;raquo;",
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
}</code></pre>
<blockquote>
<p>Example response (200, <a href="http://localhost:8000/api/publication?recent&amp;amp;limit=2">http://localhost:8000/api/publication?recent&amp;amp;limit=2</a>):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
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
<h2>Show Publication Details</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This endpoint returns the details of the specified publication by id.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/researcher/aperiam" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/researcher/aperiam"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/researcher/aperiam'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200, success):</p>
</blockquote>
<pre><code class="language-json">
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
}</code></pre>
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
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-researcher--id-" data-component="url" required  hidden>
<br>
</p>
</form>
<h2>api/researcher/activeProjects</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/researcher/activeProjects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/researcher/activeProjects"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/researcher/activeProjects'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-researcher-activeProjects" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-researcher-activeProjects"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-researcher-activeProjects"></code></pre>
</div>
<div id="execution-error-GETapi-researcher-activeProjects" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-researcher-activeProjects"></code></pre>
</div>
<form id="form-GETapi-researcher-activeProjects" data-method="GET" data-path="api/researcher/activeProjects" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-researcher-activeProjects', this);">
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
</form>
<h2>All Discussions</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This endpoint returns an archive of all discussions.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/discussions" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/discussions'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>api/discussions</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/discussions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/discussions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/discussions'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<div id="execution-results-POSTapi-discussions" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-discussions"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-discussions"></code></pre>
</div>
<div id="execution-error-POSTapi-discussions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-discussions"></code></pre>
</div>
<form id="form-POSTapi-discussions" data-method="POST" data-path="api/discussions" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-discussions', this);">
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
</form>
<h2>api/discussion/{id</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/discussion/{id" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/discussion/{id"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/discussion/{id'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-discussion--id" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-discussion--id"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-discussion--id"></code></pre>
</div>
<div id="execution-error-GETapi-discussion--id" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-discussion--id"></code></pre>
</div>
<form id="form-GETapi-discussion--id" data-method="GET" data-path="api/discussion/{id" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-discussion--id', this);">
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
</form>
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                                    <a href="#" data-language-name="python">python</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var languages = ["bash","javascript","python"];
        setupLanguages(languages);
    });
</script>
</body>
</html>