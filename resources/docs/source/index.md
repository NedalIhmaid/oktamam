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

#Companies


<!-- START_83764a2de1a941a0a3cbae52bba9776e -->
## Index
List all companies

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/companies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "company one",
            "email": "a@gmail.com",
            "logo": "\/storage\/logos\/KKZXoIgYWm7W21vszlt63YByDkxQUrYytqW8bw4g.jpeg",
            "employees_count": 0,
            "website": "http:\/\/google.com"
        },
        {
            "id": 2,
            "name": "company two",
            "email": "b@gmail.com",
            "logo": "\/storage\/logos\/dtLPT5sk5syRrbvhnNVxbtRSksrJBw0MCH3n7QAr.jpeg",
            "employees_count": 0,
            "website": "http:\/\/google.com"
        }
    ],
    "links": {
        "first": "http:\/\/ok.test\/api\/companies?page=1",
        "last": "http:\/\/ok.test\/api\/companies?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/ok.test\/api\/companies",
        "per_page": 10,
        "to": 2,
        "total": 2
    }
}
```

### HTTP Request
`GET api/companies`


<!-- END_83764a2de1a941a0a3cbae52bba9776e -->

#Employees


<!-- START_bbf5f53764a43af9eab11504db0c39b5 -->
## Index
List all employees

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/employees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/employees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "first_name": "first",
            "last_name": "last",
            "email": "b@gmail.com",
            "phone": "01285026876",
            "company": {
                "id": 1,
                "name": "company one",
                "email": "a@gmail.com",
                "logo": "\/storage\/logos\/KKZXoIgYWm7W21vszlt63YByDkxQUrYytqW8bw4g.jpeg",
                "employees_count": 1,
                "website": "http:\/\/google.com"
            }
        },
        {
            "id": 2,
            "first_name": "first",
            "last_name": "last",
            "email": "c@gmail.com",
            "phone": "01003325334",
            "company": {
                "id": 2,
                "name": "company two",
                "email": "b@gmail.com",
                "logo": "\/storage\/logos\/dtLPT5sk5syRrbvhnNVxbtRSksrJBw0MCH3n7QAr.jpeg",
                "employees_count": 1,
                "website": "http:\/\/google.com"
            }
        }
    ],
    "links": {
        "first": "http:\/\/ok.test\/api\/employees?page=1",
        "last": "http:\/\/ok.test\/api\/employees?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/ok.test\/api\/employees",
        "per_page": 10,
        "to": 2,
        "total": 2
    }
}
```

### HTTP Request
`GET api/employees`


<!-- END_bbf5f53764a43af9eab11504db0c39b5 -->


