---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_361b5d3d1511f029cdec7c78ab8195be -->
## Return a JWT

> Example request:

```bash
curl "http://localhost/users/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/users/login",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST users/login`


<!-- END_361b5d3d1511f029cdec7c78ab8195be -->
<!-- START_7114718ce5b1959b33089bc2492a2d4c -->
## users/register

> Example request:

```bash
curl "http://localhost/users/register" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/users/register",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST users/register`


<!-- END_7114718ce5b1959b33089bc2492a2d4c -->
<!-- START_ffc10be41a5903ac39725e57ce0908bd -->
## Display a listing of chatrooms with last chat message.

> Example request:

```bash
curl "http://localhost/chats" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/chats",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": true,
    "data": {
        "27": {
            "id": 15,
            "user_id": 2,
            "name": "What",
            "created": "2016-10-22T18:57:05Z",
            "user": {
                "id": 2,
                "name": "my name"
            },
            "last_message": null
        },
        "28": {
            "id": 14,
            "user_id": 2,
            "name": "What",
            "created": "2016-10-22T18:56:56Z",
            "user": {
                "id": 2,
                "name": "my name"
            },
            "last_message": null
        },
        "29": {
            "id": 13,
            "user_id": 2,
            "name": "What",
            "created": "2016-10-22T18:56:34Z",
            "user": {
                "id": 2,
                "name": "my name"
            },
            "last_message": null
        },
        "30": {
            "id": 12,
            "user_id": 2,
            "name": "another new chat",
            "created": "2016-10-22T18:44:36Z",
            "user": {
                "id": 2,
                "name": "my name"
            },
            "last_message": null
        },
        "31": {
            "id": 11,
            "user_id": 2,
            "name": "another new chat",
            "created": "2016-10-22T18:44:06Z",
            "user": {
                "id": 2,
                "name": "my name"
            },
            "last_message": null
        },
        "32": {
            "id": 10,
            "user_id": 2,
            "name": "another new chat",
            "created": "2016-10-22T18:43:48Z",
            "user": {
                "id": 2,
                "name": "my name"
            },
            "last_message": null
        },
        "33": {
            "id": 6,
            "user_id": 2,
            "name": "another new chat",
            "created": "2016-10-22T18:35:27Z",
            "user": {
                "id": 2,
                "name": "my name"
            },
            "last_message": null
        },
        "34": {
            "id": 3,
            "user_id": 1,
            "name": "My Chat",
            "created": "2016-10-22T18:20:47Z",
            "user": {
                "id": 1,
                "name": "Dude Man"
            },
            "last_message": null
        },
        "35": {
            "id": 2,
            "user_id": 2,
            "name": "Another Chat",
            "created": "2016-10-22T18:20:35Z",
            "user": {
                "id": 2,
                "name": "my name"
            },
            "last_message": {
                "id": 5,
                "user_id": 2,
                "chat_id": 2,
                "message": "Yello",
                "created": "2016-10-21T12:17:01Z",
                "user": {
                    "id": 2,
                    "name": "my name"
                }
            }
        },
        "36": {
            "id": 1,
            "user_id": 2,
            "name": "New stuff",
            "created": "2016-10-20T19:28:36Z",
            "user": {
                "id": 2,
                "name": "my name"
            },
            "last_message": {
                "id": 11,
                "user_id": 2,
                "chat_id": 1,
                "message": "asdfasdf",
                "created": "2016-10-22T19:48:29Z",
                "user": {
                    "id": 2,
                    "name": "my name"
                }
            }
        }
    },
    "pagination": {
        "page_count": 4,
        "current_page": 1,
        "has_next_page": true,
        "has_prev_page": false,
        "count": 37,
        "limit": 10
    }
}
```

### HTTP Request
`GET chats`

`HEAD chats`


<!-- END_ffc10be41a5903ac39725e57ce0908bd -->
<!-- START_534e48e40e80b68c1dc3381d667ea455 -->
## Create a new chat then display chat information.

> Example request:

```bash
curl "http://localhost/chats" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/chats",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST chats`


<!-- END_534e48e40e80b68c1dc3381d667ea455 -->
<!-- START_d89eec8e957677b40bd6c850ac7de387 -->
## Display a listing of messages.

> Example request:

```bash
curl "http://localhost/chats/{id}/messages" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/chats/{id}/messages",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": true,
    "data": [
        {
            "id": 11,
            "chat_id": 1,
            "user_id": 2,
            "message": "asdfasdf",
            "created": "2016-10-22T19:48:29Z",
            "user": {
                "id": 2,
                "name": "my name"
            }
        },
        {
            "id": 10,
            "chat_id": 1,
            "user_id": 2,
            "message": "asdf",
            "created": "2016-10-22T19:48:27Z",
            "user": {
                "id": 2,
                "name": "my name"
            }
        },
        {
            "id": 9,
            "chat_id": 1,
            "user_id": 2,
            "message": "asdfsadf",
            "created": "2016-10-22T19:48:26Z",
            "user": {
                "id": 2,
                "name": "my name"
            }
        },
        {
            "id": 8,
            "chat_id": 1,
            "user_id": 2,
            "message": "Me again",
            "created": "2016-10-22T19:43:36Z",
            "user": {
                "id": 2,
                "name": "my name"
            }
        },
        {
            "id": 7,
            "chat_id": 1,
            "user_id": 2,
            "message": "Me again",
            "created": "2016-10-22T19:42:58Z",
            "user": {
                "id": 2,
                "name": "my name"
            }
        },
        {
            "id": 4,
            "chat_id": 1,
            "user_id": 2,
            "message": "Yello",
            "created": "2016-10-21T12:16:58Z",
            "user": {
                "id": 2,
                "name": "my name"
            }
        },
        {
            "id": 3,
            "chat_id": 1,
            "user_id": 2,
            "message": "hey  yo",
            "created": "2016-10-21T12:16:40Z",
            "user": {
                "id": 2,
                "name": "my name"
            }
        },
        {
            "id": 2,
            "chat_id": 1,
            "user_id": 2,
            "message": "Hey",
            "created": "2016-10-18T18:21:45Z",
            "user": {
                "id": 2,
                "name": "my name"
            }
        },
        {
            "id": 1,
            "chat_id": 1,
            "user_id": 1,
            "message": "Hello",
            "created": "2016-10-18T17:15:55Z",
            "user": {
                "id": 1,
                "name": "Dude Man"
            }
        }
    ],
    "pagination": {
        "page_count": 1,
        "current_page": 1,
        "has_next_page": false,
        "has_prev_page": false,
        "count": 9,
        "limit": 25
    }
}
```

### HTTP Request
`GET chats/{id}/messages`

`HEAD chats/{id}/messages`


<!-- END_d89eec8e957677b40bd6c850ac7de387 -->
<!-- START_012fe0002a33a80266af5a56f9c4d320 -->
## Create a new chat message.

> Example request:

```bash
curl "http://localhost/chats/{id}/messages" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/chats/{id}/messages",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST chats/{id}/messages`


<!-- END_012fe0002a33a80266af5a56f9c4d320 -->
<!-- START_bc8b639531aa5762d47934e5149803cb -->
## Display a users information.

> Example request:

```bash
curl "http://localhost/users/me" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/users/me",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": true,
    "data": {
        "id": 45,
        "name": "todd",
        "email": "dudemanbros@gmail.com",
        "created": null,
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ1LCJpc3MiOiJodHRwOlwvXC9vcmFjaGF0LXRlc3QuZGV2XC91c2Vyc1wvbG9naW4iLCJpYXQiOjE0OTMyMzU4OTcsImV4cCI6MTQ5MzIzOTQ5NywibmJmIjoxNDkzMjM1ODk3LCJqdGkiOiJiNTkxNGI5YzZlZWNiMGFhOGVhZDIxNThmZjA1ZDUzNiJ9.CuXoyftDoCV4nrhepm_HS2Zn4Yk6ZvI3_mJKg2UjU0M"
    }
}
```

### HTTP Request
`GET users/me`

`HEAD users/me`


<!-- END_bc8b639531aa5762d47934e5149803cb -->
<!-- START_9ed2566d7b7607b36084adf9b030ffdf -->
## Update user information.

> Example request:

```bash
curl "http://localhost/users/me" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/users/me",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST users/me`


<!-- END_9ed2566d7b7607b36084adf9b030ffdf -->
