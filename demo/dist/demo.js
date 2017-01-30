angular.module('Dragtable', [])
// listen to drag events
.directive('dragMe', [function () {
  return {
    link: function(scope, element, attrs) {
      // set element as draggable
      element.attr('draggable', true).attr('style', 'cursor: e-resize;');

      // max number of dragging rows
      var limit = 50;

      //
      var offsetDiff = 0;

      // timeout
      var to = false;

      // current clicked element
      var $currentElement = false;

      // ghost element
      var $ghostElement = false;

      // original elements
      var $originalElements = false;

      // ghost wrapper template
      var ghostWrapperHtml = '<div class="ghost" style="position: fixed;">{ghostHtml}</div>';

      // ghost table data template
      var ghostHtml = '<div class="{elemClass}" style="height: {height}px; width: {width}px;"><h5 class="{elemTextClass}">{text}</h5></div>';

      // simple template function
      var t = function (s, d) {
        for (var p in d)
        s = s.replace(new RegExp('{' + p + '}', 'g'), d[p]);
        return s;
      };

      // set offset of current element
      var setOffsetDiff = function(e) {
        offsetDiff = e.originalEvent.clientX - element.offset().left;
      };

      var addGhostTdElements = function() {
        var tds = '';
        var nth = element.index() + 1;

        $originalElements = element.closest('table').find('tr').find('td:nth-child(' + nth + '):visible');

        $originalElements.addClass('ghost-data');

        var tdLimit = $originalElements.length;

        if(tdLimit > limit) {
          tdLimit = limit;
        }

        for (var i = 0; i < tdLimit; i++) {
          tds += t(ghostHtml, {
            elemClass: 'ghost__td',
            elemTextClass: 'ghost__td-text',
            height: $originalElements[i].clientHeight,
            width: $originalElements[i].clientWidth,
            text: $originalElements[i].innerHTML
          });
        }

        return tds;
      };

      var addGhostElement = function(ghostHtml) {
        element.closest('table').before(t(ghostWrapperHtml, {
          ghostHtml: ghostHtml
        }));

        $ghostElement = $('.ghost');

        var offset = element.offset();

        $ghostElement.css('top', offset.top - $(window).scrollTop() + element.outerHeight());
        $ghostElement.css('left', offset.left);
      };

      var addGhostElements = function(e) {
        element.addClass('dragging');

        if($ghostElement) {
          $ghostElement.remove();
        }

        setOffsetDiff(e);

        var ghostTds = addGhostTdElements();

        addGhostElement(ghostTds);
      };

      var clearGhostElements = function() {
        angular.element('.ghost-placeholder').removeClass('ghost-placeholder').removeAttr('width');
        angular.element('.ghost-data').removeClass('ghost-data');
      };

      element.bind('mousedown', function(e) {
        $currentElement = e.target;
      });

      element.bind('dragstart', function(e) {
        // if handle is set, check if handle is used and prevent dragging
        if(attrs.handle && (!$($currentElement).hasClass(attrs.handle) && !$($currentElement).closest('.' + attrs.handle).length)) {
          return false;
        }

        clearGhostElements();

        element.addClass('ghost-placeholder').attr('width', element.outerWidth());

        addGhostElements(e);
      });

      element.bind('drag', function(e) {
        clearTimeout(to);

        to = setTimeout(function() {
          if($ghostElement) {
            $ghostElement.css('left', e.originalEvent.clientX - offsetDiff);
          }
        }, 2);
      });

      element.bind('dragstop dragend', function(e) {
        if($ghostElement) {
          $ghostElement.remove();
        }

        clearGhostElements();

        $currentElement = false;
      });
    }
  };
}])

// listen to drop events
.directive('dropMe', [function () {
  return {
    link: function(scope, element, attrs) {
      var to = false;
      var limit = 50;

      var ghostTable = function(direction, index, output) {
        var $currentPlaceholder = angular.element('th:nth-child(' + (index) + ')').last();
        var $ghostPlaceholder = angular.element('.ghost-placeholder').last();
        var $currentElements = angular.element('tbody td:nth-child(' + (index) + ')');
        var $ghostElements = angular.element('.ghost-data');

        var tdLimit = $currentElements.length;

        if(tdLimit > limit) {
          tdLimit = limit;
        }

        if(direction === 'right') {
          $currentPlaceholder.after($ghostPlaceholder);

          for (var i = 0; i < tdLimit; i++) {
            if(typeof $ghostElements[i] !== 'undefined') {
              $currentElements[i].after($ghostElements[i]);
            } else {
              break;
            }
          }
        } else if(direction === 'left') {
          $currentPlaceholder.before($ghostPlaceholder);

          for (var j = 0; j < tdLimit; j++) {
            if(typeof $ghostElements[j] !== 'undefined') {
              $currentElements[j].before($ghostElements[j]);
            } else {
              break;
            }
          }
        }
      };

      element.bind('dragover', function(e) {
        e.preventDefault();

        clearTimeout(to);

        to = setTimeout(function() {
          var direction = e.originalEvent.x > (element.offset().left + element.width() / 2) ? 'right' : 'left';

          ghostTable(direction, element.index() + 1);
        }, 2);
      });
    }
  };
}]);

(function (DemoApp) {
  'use strict';

  DemoApp = angular.module('DemoApp', ['Dragtable']);

  DemoApp.config(function () {});
}(this));

(function(DemoApp) {

  'use strict';

  var controller = ['$scope'];

  controller.push(function($scope) {});

  angular.module('DemoApp')
    .controller('DemoController', controller);

}(this));

