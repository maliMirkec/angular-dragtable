<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">
  <title>Angular Dragtable</title>
</head>
<body>
  <div class="container py-1" ng-app="DemoApp" ng-controller="DemoController as Ctrl">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="mt-2 mb-3">Angular Dragtable</h1>
        <p class="lead">Directive that allows reorder of table columns.</p>
        <p>If you interested how to use this directive, please read this article: <a href="https://silvestarbistrovic.from.hr/en/articles/angular-dragtable">Angular dragtable</a></p>
      </div>
    </div>
    <hr class="my-2">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="mb-3">Usage</h2>
        <p>First include Angular Dragtable in your project:</p>
        <pre><code>(function (DemoApp) {
          'use strict';

          DemoApp = angular.module('DemoApp', ['Dragtable']);

          DemoApp.config(function () {});
        }(this));</code></pre>
        <p>To allow column reorder, add directives <code>drag-me</code> and <code>drop-me</code> on <code>th</code> elements, like this:</p>
        <pre><code>&lt;table&gt;
  &lt;thead&gt;
    &lt;tr&gt;
      &lt;th&gt;ID&lt;/th&gt;
      &lt;th drag-me drop-me&gt;Name&lt;/th&gt;
      &lt;th drag-me drop-me&gt;Description&lt;/th&gt;
      &lt;th drag-me drop-me&gt;Age&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;td&gt;1&lt;/td&gt;
      &lt;td&gt;Item 1&lt;/td&gt;
      &lt;td&gt;Description 1&lt;/td&gt;
      &lt;td&gt;1&lt;/td&gt;
    &lt;/tr&gt;
    ...
  &lt;/tbody&gt;
&lt;/table&gt;</code></pre>
        </div>
      </div>
      <hr class="my-2">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="mb-3">Options</h2>
          <h4 class="mb-3">handle</h4>
          <p>To prevent drag event on whole <code>th</code> element, provide <code>data-handle</code> attribute with handle selector, like this:</p>
          <pre><code>&lt;th drag-me drop-me data-handle=".handle"&gt;Name &lt;span class="handle"&gt;Handle&lt;/span&gt;&lt;/th&gt;</code></pre>
          <p>Now column could be dragged only using provided handle element.</p>
          <p><i>Note that handle element should be inside of <code>th</code> element.</i></p>
          <h4 class="mb-3">limit</h4>
          <p>To prevent performance issues, you could limit the number of <i>ghost</i> elements by providing <code>data-limit</code> attribute.</p>
          <p>Add number of rows that should be duplicated, like this:</p>
          <pre><code>&lt;th drag-me drop-me data-limit="50"&gt;Name&lt;/th&gt;</code></pre>
        </div>
      </div>
      <hr class="my-2">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="mb-3">Demo</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-sm table-striped table-hover">
            <thead class="thead-inverse">
              <tr>
                <th>ID</th>
                <th drag-me drop-me data-limit="50" data-handle=".handle">Name <span class="badge badge-info handle">Handle</span></th>
                <th drag-me drop-me data-limit="50" data-handle=".handle">Description <span class="badge badge-info handle">Handle</span></th>
                <th drag-me drop-me data-limit="50">Age <span class="badge badge-info handle">Handle</span></th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=1; $i <= 1000; $i++) { ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td>Item <?php echo $i; ?></td>
                  <td>Description <?php echo $i; ?></td>
                  <td><?php echo $i; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="./bower_components/jquery/dist/jquery.min.js"></script>
    <script src="./bower_components/tether/dist/js/tether.min.js"></script>
    <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./bower_components/angular/angular.min.js"></script>
    <script src="./demo/dist/demo.js"></script>
  </body>
  </html>
