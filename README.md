# EzuruTask

Simple integration with Github API

## Description

* A list of the most popular repositories, sorted by number of stars.
* An option to be able to view the top 10, 50, 100 repositories should be available.
* Given a date, the most popular repositories created from this date onwards should be returned.

## Getting Started | Installing

```
composer install
```
```
php artisan serv
```

## End Point

* Sorted-By-Stars 
```
http://127.0.0.1:8000/api/v2/sortedby/stars
```

* Top-Repo
```
http://127.0.0.1:8000/api/v2/topRepo?length=4
```

* Filter-By-ProgrammingLanguage
```
http://127.0.0.1:8000/api/v2/filterbylanguage?language=php
```

* Filter-By-Date
```
http://127.0.0.1:8000/api/v2/filterbydate?date=2020-01-10
```