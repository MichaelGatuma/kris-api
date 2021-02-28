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
            <li>Last updated: February 28 2021</li>
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
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p><h1>Authentication Endpoints</h1>
<h2>Register user</h2>
<p>This endpoint lets you register a user.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.sensenventures.com/api/user/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Title":"Prof.","name":"John Doe","email":"johndoe2@kris.com","password":"minima","device_name":"Huawei STK-L21"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/user/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "Title": "Prof.",
    "name": "John Doe",
    "email": "johndoe2@kris.com",
    "password": "minima",
    "device_name": "Huawei STK-L21"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://api.sensenventures.com/api/user/register',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'Title' =&gt; 'Prof.',
            'name' =&gt; 'John Doe',
            'email' =&gt; 'johndoe2@kris.com',
            'password' =&gt; 'minima',
            'device_name' =&gt; 'Huawei STK-L21',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/user/register'
payload = {
    "Title": "Prof.",
    "name": "John Doe",
    "email": "johndoe2@kris.com",
    "password": "minima",
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
    "http://api.sensenventures.com/api/user/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"enim","password":"quia","device_name":"Huawei STK-L21"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/user/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "enim",
    "password": "quia",
    "device_name": "Huawei STK-L21"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://api.sensenventures.com/api/user/login',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'enim',
            'password' =&gt; 'quia',
            'device_name' =&gt; 'Huawei STK-L21',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/user/login'
payload = {
    "email": "enim",
    "password": "quia",
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
    "http://api.sensenventures.com/api/user/forgot-password-request" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"quod"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/user/forgot-password-request"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "quod"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://api.sensenventures.com/api/user/forgot-password-request',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'quod',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/user/forgot-password-request'
payload = {
    "email": "quod"
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
<h2>Change Password</h2>
<p>This endpoint lets you change password.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.sensenventures.com/api/user/reset-password" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"quos","password":"et","current_password":"voluptatem"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/user/reset-password"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "quos",
    "password": "et",
    "current_password": "voluptatem"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://api.sensenventures.com/api/user/reset-password',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'quos',
            'password' =&gt; 'et',
            'current_password' =&gt; 'voluptatem',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/user/reset-password'
payload = {
    "email": "quos",
    "password": "et",
    "current_password": "voluptatem"
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
<p>This endpoint lets you logout a user.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.sensenventures.com/api/user/logout" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/user/logout"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://api.sensenventures.com/api/user/logout',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/user/logout'
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
<pre><code class="language-json">{
    "success": true,
    "message": "Logged out Successfully."
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
</form><h1>Discussion Endpoints</h1>
<h2>View All Discussions</h2>
<p>This endpoint returns an archive of all discussions.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/discussions" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/discussions"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/discussions',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/discussions'
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
<h2>Create a new Discussion</h2>
<p>This endpoint lets a user publish a discussion/post.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.sensenventures.com/api/discussions" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"mollitia","body":"magni"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/discussions"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "mollitia",
    "body": "magni"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://api.sensenventures.com/api/discussions',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'title' =&gt; 'mollitia',
            'body' =&gt; 'magni',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/discussions'
payload = {
    "title": "mollitia",
    "body": "magni"
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
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
<h2>Show Discussion Details</h2>
<p>This endpoint returns the discussion details.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/discussion/{id" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/discussion/{id"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/discussion/{id',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/discussion/{id'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
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
</form><h1>Dropdown Inflating Endpoints</h1>
<h2>Research Areas</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/researchareas" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/researchareas"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/researchareas',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/researchareas'
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
<div id="execution-results-GETapi-researchareas" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-researchareas"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-researchareas"></code></pre>
</div>
<div id="execution-error-GETapi-researchareas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-researchareas"></code></pre>
</div>
<form id="form-GETapi-researchareas" data-method="GET" data-path="api/researchareas" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-researchareas', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-researchareas" onclick="tryItOut('GETapi-researchareas');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-researchareas" onclick="cancelTryOut('GETapi-researchareas');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-researchareas" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/researchareas</code></b>
</p>
<p>
<label id="auth-GETapi-researchareas" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-researchareas" data-component="header"></label>
</p>
</form>
<h2>Institutions</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/institutions" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/institutions"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/institutions',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/institutions'
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
<div id="execution-results-GETapi-institutions" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-institutions"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-institutions"></code></pre>
</div>
<div id="execution-error-GETapi-institutions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-institutions"></code></pre>
</div>
<form id="form-GETapi-institutions" data-method="GET" data-path="api/institutions" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-institutions', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-institutions" onclick="tryItOut('GETapi-institutions');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-institutions" onclick="cancelTryOut('GETapi-institutions');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-institutions" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/institutions</code></b>
</p>
<p>
<label id="auth-GETapi-institutions" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-institutions" data-component="header"></label>
</p>
</form>
<h2>Departments</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/departments?institution=eos" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/departments"
);

let params = {
    "institution": "eos",
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/departments',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'institution'=&gt; 'eos',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/departments'
params = {
  'institution': 'eos',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-departments" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-departments"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-departments"></code></pre>
</div>
<div id="execution-error-GETapi-departments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-departments"></code></pre>
</div>
<form id="form-GETapi-departments" data-method="GET" data-path="api/departments" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-departments', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-departments" onclick="tryItOut('GETapi-departments');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-departments" onclick="cancelTryOut('GETapi-departments');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-departments" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/departments</code></b>
</p>
<p>
<label id="auth-GETapi-departments" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-departments" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>institution</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="institution" data-endpoint="GETapi-departments" data-component="query"  hidden>
<br>
Search department by the insitution name.</p>
</form>
<h2>Funders</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/funders" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/funders"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/funders',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/funders'
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
<div id="execution-results-GETapi-funders" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-funders"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-funders"></code></pre>
</div>
<div id="execution-error-GETapi-funders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-funders"></code></pre>
</div>
<form id="form-GETapi-funders" data-method="GET" data-path="api/funders" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-funders', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-funders" onclick="tryItOut('GETapi-funders');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-funders" onclick="cancelTryOut('GETapi-funders');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-funders" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/funders</code></b>
</p>
<p>
<label id="auth-GETapi-funders" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-funders" data-component="header"></label>
</p>
</form><h1>Other Endpoints</h1>
<h2>api/img</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/img" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/img"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/img',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/img'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "File not found at path: ProfilePictures\/P78sAXZjz9faEgCWJjcr6MsHfZOrEnkVmJyXodaF.jpg",
    "exception": "Illuminate\\Contracts\\Filesystem\\FileNotFoundException",
    "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\FilesystemAdapter.php",
    "line": 152,
    "trace": [
        {
            "file": "C:\\laragon\\www\\kris-api\\routes\\api.php",
            "line": 15,
            "function": "get",
            "class": "Illuminate\\Filesystem\\FilesystemAdapter",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 230,
            "function": "{closure}",
            "class": "Illuminate\\Routing\\RouteFileRegistrar",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 200,
            "function": "runCallable",
            "class": "Illuminate\\Routing\\Route",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 692,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 127,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 103,
            "function": "handleRequest",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 55,
            "function": "handleRequestUsingNamedLimiter",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\sanctum\\src\\Http\\Middleware\\EnsureFrontendRequestsAreStateful.php",
            "line": 33,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Laravel\\Sanctum\\Http\\Middleware\\{closure}",
            "class": "Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\sanctum\\src\\Http\\Middleware\\EnsureFrontendRequestsAreStateful.php",
            "line": 34,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\symfony\\console\\Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\symfony\\console\\Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\symfony\\console\\Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "-&gt;"
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-img" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-img"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-img"></code></pre>
</div>
<div id="execution-error-GETapi-img" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-img"></code></pre>
</div>
<form id="form-GETapi-img" data-method="GET" data-path="api/img" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-img', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-img" onclick="tryItOut('GETapi-img');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-img" onclick="cancelTryOut('GETapi-img');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-img" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/img</code></b>
</p>
</form><h1>Project Endpoints</h1>
<h2>Search Projects with pagination</h2>
<p>This endpoint return an archive of the projects.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/projects?perPage=14&amp;recent=8&amp;limit=libero" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/projects"
);

let params = {
    "perPage": "14",
    "recent": "8",
    "limit": "libero",
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/projects',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'perPage'=&gt; '14',
            'recent'=&gt; '8',
            'limit'=&gt; 'libero',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/projects'
params = {
  'perPage': '14',
  'recent': '8',
  'limit': 'libero',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<blockquote>
<p>Example response (200, success):</p>
</blockquote>
<pre><code class="language-json">
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
"label": "&amp;laquo; Previous",
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
"label": "Next &amp;raquo;",
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
<h2>Deep Search Projects</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/projects/search?institution=voluptatem&amp;researcharea=in&amp;department=dolor&amp;funder=id" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/projects/search"
);

let params = {
    "institution": "voluptatem",
    "researcharea": "in",
    "department": "dolor",
    "funder": "id",
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/projects/search',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'institution'=&gt; 'voluptatem',
            'researcharea'=&gt; 'in',
            'department'=&gt; 'dolor',
            'funder'=&gt; 'id',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/projects/search'
params = {
  'institution': 'voluptatem',
  'researcharea': 'in',
  'department': 'dolor',
  'funder': 'id',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>Show Project Details</h2>
<p>This endpoint returns the details of the specified project by id.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/project/dolorum" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/project/dolorum"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/project/dolorum',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/project/dolorum'
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
<h2>Request Private Research Project</h2>
<p>This endpoint lets a user request access to a private project.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.sensenventures.com/api/project/2/request" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/project/2/request"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://api.sensenventures.com/api/project/2/request',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/project/2/request'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
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
<h2>Grant access to a private project</h2>
<p>This endpoint lets a user(owner) grant access to a private project.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.sensenventures.com/api/project/14/grant" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/project/14/grant"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://api.sensenventures.com/api/project/14/grant',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/project/14/grant'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
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
</form><h1>Publication Endpoints</h1>
<h2>Search Publications with pagination</h2>
<p>This endpoint return an archive of the publications.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/publications?perPage=10&amp;recent=11&amp;limit=sit" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/publications"
);

let params = {
    "perPage": "10",
    "recent": "11",
    "limit": "sit",
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/publications',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'perPage'=&gt; '10',
            'recent'=&gt; '11',
            'limit'=&gt; 'sit',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/publications'
params = {
  'perPage': '10',
  'recent': '11',
  'limit': 'sit',
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
<h2>Deep Search Publications</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/publications/search?institution=asperiores&amp;researcharea=nulla&amp;department=veniam&amp;funder=consectetur" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/publications/search"
);

let params = {
    "institution": "asperiores",
    "researcharea": "nulla",
    "department": "veniam",
    "funder": "consectetur",
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/publications/search',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'institution'=&gt; 'asperiores',
            'researcharea'=&gt; 'nulla',
            'department'=&gt; 'veniam',
            'funder'=&gt; 'consectetur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/publications/search'
params = {
  'institution': 'asperiores',
  'researcharea': 'nulla',
  'department': 'veniam',
  'funder': 'consectetur',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>Show Publication Details</h2>
<p>This endpoint returns the details of the specified publication by id.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/publication/11" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/publication/11"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/publication/11',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/publication/11'
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
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-publication--id-" data-component="url" required  hidden>
<br>
The id of the publication</p>
</form>
<h2>Request Private Publication</h2>
<p>This endpoint lets a user request access to a private publication.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.sensenventures.com/api/publication/11/request" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/publication/11/request"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://api.sensenventures.com/api/publication/11/request',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/publication/11/request'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
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
<h2>Grant Access to Private Publication</h2>
<p>This endpoint lets a user (publication owner) grant access to a requested private publication.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.sensenventures.com/api/publication/15/grant" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/publication/15/grant"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://api.sensenventures.com/api/publication/15/grant',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/publication/15/grant'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
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
</form><h1>Researcher Endpoints</h1>
<h2>List all Researchers</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/researchers?institution=fugit&amp;researcharea=harum&amp;department=eum&amp;name=dicta" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/researchers"
);

let params = {
    "institution": "fugit",
    "researcharea": "harum",
    "department": "eum",
    "name": "dicta",
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/researchers',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'institution'=&gt; 'fugit',
            'researcharea'=&gt; 'harum',
            'department'=&gt; 'eum',
            'name'=&gt; 'dicta',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/researchers'
params = {
  'institution': 'fugit',
  'researcharea': 'harum',
  'department': 'eum',
  'name': 'dicta',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
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
<b><code>institution</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="institution" data-endpoint="GETapi-researchers" data-component="query"  hidden>
<br>
Search by the given research institution</p>
<p>
<b><code>researcharea</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="researcharea" data-endpoint="GETapi-researchers" data-component="query"  hidden>
<br>
Search by the given research area</p>
<p>
<b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="department" data-endpoint="GETapi-researchers" data-component="query"  hidden>
<br>
Search by the given department</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="GETapi-researchers" data-component="query"  hidden>
<br>
Search researcher by their name</p>
</form>
<h2>View a single researcher</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/researcher/" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/researcher/"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/researcher/',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/researcher/'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\AbstractRouteCollection.php",
    "line": 43,
    "trace": [
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RouteCollection.php",
            "line": 162,
            "function": "handleMatchedRoute",
            "class": "Illuminate\\Routing\\AbstractRouteCollection",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 646,
            "function": "match",
            "class": "Illuminate\\Routing\\RouteCollection",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 635,
            "function": "findRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\symfony\\console\\Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\symfony\\console\\Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\symfony\\console\\Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\kris-api\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "-&gt;"
        }
    ]
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
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-researcher--id-" data-component="url" required  hidden>
<br>
The specified researcher id.</p>
</form>
<h2>View a researcher profile of the authenticated user</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/researcher/user" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/researcher/user"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/researcher/user',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/researcher/user'
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
<div id="execution-results-GETapi-researcher-user" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-researcher-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-researcher-user"></code></pre>
</div>
<div id="execution-error-GETapi-researcher-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-researcher-user"></code></pre>
</div>
<form id="form-GETapi-researcher-user" data-method="GET" data-path="api/researcher/user" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-researcher-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-researcher-user" onclick="tryItOut('GETapi-researcher-user');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-researcher-user" onclick="cancelTryOut('GETapi-researcher-user');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-researcher-user" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/researcher/user</code></b>
</p>
<p>
<label id="auth-GETapi-researcher-user" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-researcher-user" data-component="header"></label>
</p>
</form>
<h2>View a single researcher</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/researcher/user/" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/researcher/user/"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/researcher/user/',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/researcher/user/'
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
<div id="execution-results-GETapi-researcher-user--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-researcher-user--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-researcher-user--id-"></code></pre>
</div>
<div id="execution-error-GETapi-researcher-user--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-researcher-user--id-"></code></pre>
</div>
<form id="form-GETapi-researcher-user--id-" data-method="GET" data-path="api/researcher/user/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-researcher-user--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-researcher-user--id-" onclick="tryItOut('GETapi-researcher-user--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-researcher-user--id-" onclick="cancelTryOut('GETapi-researcher-user--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-researcher-user--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/researcher/user/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-researcher-user--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-researcher-user--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-researcher-user--id-" data-component="url" required  hidden>
<br>
The specified user id.</p>
</form>
<h2>Show Researcher&#039;s Active Projects</h2>
<p>This endpoint return the active projects of the authenticated user.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/researcher/activeProjects" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/researcher/activeProjects"
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/researcher/activeProjects',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/researcher/activeProjects'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
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
</form><h1>Upcoming Events Endpoints</h1>
<h2>Display a listing of the Upcoming Events.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/events?skip=4&amp;limit=7" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/events"
);

let params = {
    "skip": "4",
    "limit": "7",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/events',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'skip'=&gt; '4',
            'limit'=&gt; '7',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/events'
params = {
  'skip': '4',
  'limit': '7',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "data": [],
    "message": "Upcoming Events retrieved successfully"
}</code></pre>
<div id="execution-results-GETapi-events" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-events"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-events"></code></pre>
</div>
<div id="execution-error-GETapi-events" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-events"></code></pre>
</div>
<form id="form-GETapi-events" data-method="GET" data-path="api/events" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-events', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-events" onclick="tryItOut('GETapi-events');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-events" onclick="cancelTryOut('GETapi-events');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-events" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/events</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>skip</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="skip" data-endpoint="GETapi-events" data-component="query"  hidden>
<br>
Skip the first specified number of entries</p>
<p>
<b><code>limit</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="limit" data-endpoint="GETapi-events" data-component="query"  hidden>
<br>
Limit the response to the specified number of entries</p>
</form>
<h2>Display the specified Upcoming Event.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/events/temporibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/events/temporibus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/events/temporibus',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/events/temporibus'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Upcoming Event not found"
}</code></pre>
<div id="execution-results-GETapi-events--event_id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-events--event_id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-events--event_id-"></code></pre>
</div>
<div id="execution-error-GETapi-events--event_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-events--event_id-"></code></pre>
</div>
<form id="form-GETapi-events--event_id-" data-method="GET" data-path="api/events/{event_id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-events--event_id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-events--event_id-" onclick="tryItOut('GETapi-events--event_id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-events--event_id-" onclick="cancelTryOut('GETapi-events--event_id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-events--event_id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/events/{event_id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>event_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="event_id" data-endpoint="GETapi-events--event_id-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-events--event_id-" data-component="url" required  hidden>
<br>
The id of the specified Upcoming Event</p>
</form><h1>User Management Endpoints</h1>
<h2>User Details</h2>
<p>This endpoint lets you login a user.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/user" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/user',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/user'
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
<p>Example response (400):</p>
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
<h2>Delete user account</h2>
<p>This endpoint lets you delete the user account.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.sensenventures.com/api/user/delete-account" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://api.sensenventures.com/api/user/delete-account',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/user/delete-account'
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
<pre><code class="language-json">{
    "success": true,
    "message": "Your account has been deleted successfully"
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
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.sensenventures.com/api/user/profile-details?fields=title%2Cpublished_at%2Cis_public" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Title":"Prof.","name":"John Doe","email":"john@kris.com."}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/user/profile-details"
);

let params = {
    "fields": "title,published_at,is_public",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://api.sensenventures.com/api/user/profile-details',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'fields'=&gt; 'title,published_at,is_public',
        ],
        'json' =&gt; [
            'Title' =&gt; 'Prof.',
            'name' =&gt; 'John Doe',
            'email' =&gt; 'john@kris.com.',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<blockquote>
<p>Example response (200, success):</p>
</blockquote>
<pre><code class="language-json">
{
"success" : "true",
"data" : $user,
"message" : "Your profile has been updates successfully"
}</code></pre>
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
<h2>Add user Image</h2>
<p>This endpoint lets you upload a user profile image.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.sensenventures.com/api/user/profile-image" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "file=@C:\Users\USER\AppData\Local\Temp\php148F.tmp" </code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://api.sensenventures.com/api/user/profile-image',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'file',
                'contents' =&gt; fopen('C:\Users\USER\AppData\Local\Temp\php148F.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/user/profile-image'
files = {
  'file': open('C:\Users\USER\AppData\Local\Temp\php148F.tmp', 'rb')
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
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
"success" : true,
"data" : $user,
"message" : "Profile Photo Updated successfully"
}</code></pre>
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
<h2>Get user Image Url</h2>
<p>This endpoint lets you fetch a logged in user profile image or fetch a user image by user id.</p>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.sensenventures.com/api/user/profile-image?user_id=14" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.sensenventures.com/api/user/profile-image"
);

let params = {
    "user_id": "14",
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
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://api.sensenventures.com/api/user/profile-image',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'user_id'=&gt; '14',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://api.sensenventures.com/api/user/profile-image'
params = {
  'user_id': '14',
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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