# Programacion-III-TP1
A Simple API that returns countries information by different criteria.
just copy one of the [Endpoints List](#endpoint-list) below and pass the search text at the end of it.
## Usage

```python
Request Url: localhost/TP1/countries/byName/Argentina
Request Method: GET
```
Response:

```python
[
    {
        "name": "Argentina",
        "region": "Americas",
        "subregion": "South America",
        "capital": "Buenos Aires",
        "languages": [
            "Spanish",
            "Guaraní"
        ],
        "data": { ... [Extended Country data] }
    }
]
```

## Endpoint List

```python
Request Url: localhost/TP1/countries/byContinent/Americas
Request Method: GET
```
```python
Request Url: localhost/TP1/countries/bySubregion/South-America
Request Method: GET
```
```python
Request Url: localhost/TP1/countries/byCapital/Buenos-Aires
Request Method: GET
```
```python
Request Url: localhost/TP1/countries/byLanguage/Spanish
Request Method: GET
```

## Extras
* Searchs countries by name.
```python
Request Url: localhost/TP1/countries/byName/Argentina
Request Method: GET
```
<br>

* Groups countries by region.
```python
Request Url: localhost/TP1/countries/byContinent
Request Method: GET
```