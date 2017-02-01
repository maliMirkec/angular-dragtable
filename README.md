# Angular Dragtable

Directive that allows reorder of table columns.

## Dependencies

This directive needs jQuery to work.

## Installation

Download files or use bower: `bower install angular-dragtable`.

## Usage

First include Angular Dragtable in your project:

```javascript
(function (DemoApp) {
  'use strict';

  DemoApp = angular.module('DemoApp', ['Dragtable']);

  DemoApp.config(function () {});
}(this));
```
To allow column reorder, add directives `drag-me` and `drop-me` on `th` elements, like this:

```html
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th drag-me drop-me>Name</th>
      <th drag-me drop-me>Description</th>
      <th drag-me drop-me>Age</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Item 1</td>
      <td>Description 1</td>
      <td>1</td>
    </tr>
    ...
  </tbody>
</table>
```

## Options

#### handle

To prevent drag event on whole `th` element, provide `data-handle` attribute with handle selector, like this:

```html
<th drag-me drop-me data-handle=".handle">Name <span class="handle">Handle</span></th>
```

Now column could be dragged only using provided handle element.
_Note that handle element should be inside of `th` element._

#### limit

To prevent performance issues, you could limit the number of _ghost_ elements by providing `data-limit` attribute.
Add number of rows that should be duplicated, like this:

```html
<th drag-me drop-me data-limit="50">Name</th>
```

## Demo
https://frontend-developer.xyz/angular-dragtable/

## Guide
https://silvestarbistrovic.from.hr/en/articles/angular-dragtable
