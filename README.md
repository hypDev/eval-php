# Technical Assessment

## Overview

Please complete this exercise which uses the [Slim](https://www.slimframework.com) Framework.

The following application is feature complete, you do not need to add any additional features.

However the application is not perfect and needs refactoring and bug fixes. There are several things to fix, finding every issue is not required.

This is expected to take no more than 3 hours. Please do not exceed 3 hours.

If there isn't time to fix everything, you can simply point out what the issues are and how you would resolve it.

---

# Install
```
$ sudo apt install php php-curl php-dom php-mbstring
$ composer install
```


## Getting started
If you have docker-compose installed you can simply run:
```
$ docker-compose up
```

If you do not but you have PHP installed, you should be able to run:
```
$ php -S 0.0.0.0:8080 -t public
```

### Routes

- `GET /search/author/:author_name`
- `POST /create`
- `POST /reset`

---

## Features

- Create a book with at least the fields: `title` and `author`.
- Find books by author field.

---

## Data definition

### Book

- title
  - string
  - minimum of 1 character
  - this field is required to create a new book
  - this field must be unique
- author
  - string
  - minimum of 2 characters
  - this field is required to create a new book

---

## Data examples

### Create Book

The following input json would create a book

```json
{
  "title": "A Short History of Nearly Everything",
  "author": "Bill Bryson"
}
```

### Fetching books

- return all books, sorted by title ascending, for all authors if no author is specified.
- return all books, sorted by title ascending, for a specific author.

The json data returned should at least have the following elements

```json
[
  {
    "title": "A Short History of Nearly Everything",
    "author": "Bill Bryson"
  }
]
```

---

## Submission

Choose one of the following

- provide a public repo
- zip all files and email
