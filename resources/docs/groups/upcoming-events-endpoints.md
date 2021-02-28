# Upcoming Events Endpoints


## Display a listing of the Upcoming Events.




> Example request:

```bash
curl -X GET \
    -G "http://api.sensenventures.com/api/events?skip=18&limit=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.sensenventures.com/api/events"
);

let params = {
    "skip": "18",
    "limit": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
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
    'http://api.sensenventures.com/api/events',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'skip'=> '18',
            'limit'=> '1',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.sensenventures.com/api/events'
params = {
  'skip': '18',
  'limit': '1',
}
headers = {
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
    "data": [],
    "message": "Upcoming Events retrieved successfully"
}
```
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



