// Avoid `console` errors in browsers that lack a console.
(function() {
  var method;
  var noop = function () {};
  var methods = [
    'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
    'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
    'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
    'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }
}());

// PREFIXFREE PLUGIN CODE
(function($, self){

if(!$ || !self) {
  return;
}

for(var i=0; i<self.properties.length; i++) {
  var property = self.properties[i],
    camelCased = StyleFix.camelCase(property),
    PrefixCamelCased = self.prefixProperty(property, true);
  
  $.cssProps[camelCased] = PrefixCamelCased;
}

})(window.jQuery, window.PrefixFree);
