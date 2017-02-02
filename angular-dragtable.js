angular.module('Dragtable', [])
// listen to drag events
.directive('dragMe', [function () {
  return {
    link: function(scope, element, attrs) {
      // set element as draggable
      element.attr('draggable', true);

      // add custom cursor
      if(attrs.handle && element.find(attrs.handle)) {
        element.find(attrs.handle).attr('style', 'cursor: e-resize;');
      } else {
        element.attr('style', 'cursor: e-resize;');
      }

      // max number of dragging rows
      var limit = attrs.limit || 50;

      // current element offset position
      var offsetDiff = 0;

      // timeout object
      var toObject = false;

      // current clicked element
      var $currentElement = false;

      // ghost element
      var $ghostWrapper = false;

      // ghost wrapper template
      var ghostWrapperHtml = '<div class="ghost" style="position: fixed;">{ghostHtml}</div>';

      // ghost table data template
      var ghostHtml = '<div class="{elemClass}" style="height: {height}px; width: {width}px;">{text}</div>';

      var mouseX, mouseY;

      $(document).on("dragover", function(event) {
        mouseX = event.originalEvent.clientX;
        mouseY = event.originalEvent.clientY;
      });

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

      // add ghost elements
      var addGhostElements = function(e) {
        // if exists, remove previous $ghostWrapper
        if($ghostWrapper) {
          $ghostWrapper.remove();
        }

        // calculate current element offset
        setOffsetDiff(e);

        // add $ghostWrapper element
        addGhostWrapperElements(addGhostTdElements());
      };

      // replicate every table data element
      var addGhostTdElements = function() {
        // html string
        var ghostTdHtml = '';

        // get current element index
        var nth = element.index() + 1;

        // find matching element in table
        var $tdElements = element.closest('table').find('tr td:nth-child(' + nth + '):visible');

        // add class on current td elements
        $tdElements.addClass('ghost__data');

        // check table row count
        var tdLimit = $tdElements.length;

        // check if table row count is bigger than limit and reset if it is
        if(tdLimit > limit) {
          tdLimit = limit;
        }

        // for every row, generate td html and concat it
        for (var i = 0; i < tdLimit; i++) {
          var $currentTdElement = $($tdElements[i]);
          ghostTdHtml += t(ghostHtml, {
            elemClass: 'ghost__td',
            height: $currentTdElement.outerHeight(),
            width: $currentTdElement.outerWidth(),
            text: $currentTdElement.html()
          });
        }

        // return generated ghostTdHtml
        return ghostTdHtml;
      };

      // add final wrapper element with replicated table data elements
      var addGhostWrapperElements = function(ghostHtml) {
        // append ghost wrapper before table
        element.closest('table').before(t(ghostWrapperHtml, {
          ghostHtml: ghostHtml
        }));

        // find appended element
        $ghostWrapper = $('.ghost');

        // get current element offset
        var offset = element.offset();

        // add top and left offsets to appended element
        $ghostWrapper.css('top', offset.top - $(window).scrollTop() + element.outerHeight());
        $ghostWrapper.css('left', offset.left);
      };

      // find and remove unnecessary ghost classes and attributes
      var clearGhostElements = function() {
        angular.element('.ghost__placeholder').removeClass('ghost__placeholder').removeAttr('width');
        angular.element('.ghost__data').removeClass('ghost__data');
      };

      // make sure current target is element clicked
      element.bind('mousedown', function(e) {
        $currentElement = e.target;
      });

      // listen when drag event starts
      element.bind('dragstart', function(e) {
        // firefox fix
        if(typeof e.originalEvent.dataTransfer !== 'undefined' && typeof e.originalEvent.dataTransfer.mozSourceNode !== 'undefined') {
          e.originalEvent.dataTransfer.setData('application/node type', this);
        }

        // if handle is set, check if handle is used and prevent dragging if not
        if(attrs.handle && (!$($currentElement).hasClass(attrs.handle) && !$($currentElement).closest(attrs.handle).length)) {
          return false;
        }

        // clear previous ghost elements
        clearGhostElements();

        // add class for styling and lock element width
        element.addClass('ghost__placeholder').attr('width', element.outerWidth());

        // add ghost elements
        addGhostElements(e);
      });

      // listen when drag event is in an action
      element.bind('drag', function(e) {
        // clear timeout object
        clearTimeout(toObject);

        // create timeout object
        toObject = setTimeout(function() {
          // if $ghostWrapper exists, update left offset position
          if($ghostWrapper) {
            $ghostWrapper.css('left', mouseX - offsetDiff);
          }
        }, 5);
      });

      // listen when drag event finishes
      element.bind('dragend', function(e) {
        // if $ghostWrapper exists, remove it
        if($ghostWrapper) {
          $ghostWrapper.remove();
        }

        // clear any ghost element
        clearGhostElements();

        // reset $currentElement
        $currentElement = false;
      });
    }
  };
}])

// listen to drop events
.directive('dropMe', [function () {
  return {
    link: function(scope, element, attrs) {
      // timeout object
      var toObject = false;

      // last known direction
      var lastDirection = false;

      // last known index
      var lastIndex = false;

      // add ghost table column elements
      var ghostTable = function(direction, index) {
        // check if last know direction and current direction
        // and last know index and current index are the same
        // if so, prevent action
        if(direction === lastDirection && index === lastDirection) {
          return false;
        }

        // find last ghost placeholder
        var $ghostPlaceholder = angular.element('.ghost__placeholder').last();

        // find current table data elements
        var $currentElements = angular.element('tbody td:nth-child(' + (index) + ')');

        // find ghost data elements
        var $ghostElements = angular.element('.ghost__data');

        // get current table data elements count
        var tdLimit = $currentElements.length;

        // check if direction is right
        if(direction === 'right') {
          // append ghost placeholder after the current element
          element.after($ghostPlaceholder);

          // append ghost data elements after current table data elements
          for (var i = 0; i < tdLimit; i++) {
            if(typeof $ghostElements[i] !== 'undefined') {
              $($currentElements[i]).after($ghostElements[i]);
            } else {
              break;
            }
          }
          // check if direction is left
        } else if(direction === 'left') {
          // append ghost placeholder before the current element
          element.before($ghostPlaceholder);

          for (var j = 0; j < tdLimit; j++) {
            // append ghost data elements before current table data elements
            if(typeof $ghostElements[j] !== 'undefined') {
              $($currentElements[j]).before($ghostElements[j]);
            } else {
              break;
            }
          }
        }

        // cache current direction
        lastDirection = direction;

        // cache current index
        lastIndex = index;
      };

      // listen when dragging element is over current element
      element.bind('dragover', function(e) {
        // prevent default action
        e.preventDefault();

        // clear timeout object
        clearTimeout(toObject);

        // create timeout object
        toObject = setTimeout(function() {
          // calculate direction of dragging element
          var direction = e.originalEvent.x > (element.offset().left + element.width() / 2) ? 'right' : 'left';

          // append ghost elements into the table
          ghostTable(direction, element.index() + 1);
        }, 50);
      });

      // listen when dragging element is dropped into current element
      element.bind('drop', function(e) {
        // calculate direction of dragging element
        var direction = e.originalEvent.x > (element.offset().left + element.width() / 2) ? 'right' : 'left';

        // append ghost elements into the table
        ghostTable(direction, element.index() + 1, true);
      });
    }
  };
}]);
