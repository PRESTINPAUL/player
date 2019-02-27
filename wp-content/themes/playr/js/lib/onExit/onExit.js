// heaviliy modified https://github.com/carlsednaoui/ouibounce
function onExit(callback, options) {
  "use strict";

  options = options || {};
  var sensitivity  = withDefault(options.sensitivity, 20);
  var timer        = withDefault(options.timer, 3000);
  var delay        = withDefault(options.delay, 0);
  var initTimer    = null;
  var delayTimer  = null;
  var html        = document.documentElement;

  function withDefault(property, defaultValue) {
    return typeof property === 'undefined' ? defaultValue : property;
  }

  initTimer = setTimeout(attachOuiBounce, timer);
  function attachOuiBounce() {
    html.addEventListener('mouseleave', handleMouseleave);
    html.addEventListener('mouseenter', handleMouseenter);
    html.addEventListener('keydown', handleKeydown);
  }

  function handleMouseleave(e) {
    if (e.clientY > sensitivity) return;
    delayTimer = setTimeout(fire, delay);
  }

  function handleMouseenter() {
    if (delayTimer) {
      clearTimeout(delayTimer);
      delayTimer = null;
    }
  }

  var disableKeydown = false;
  function handleKeydown(e) {
    if (disableKeydown) return;
    else if(!e.metaKey || e.keyCode !== 76) return;

    disableKeydown = true;
    delayTimer = setTimeout(fire, delay);
  }

  function fire() {
    callback();
    dispose();
  }

  function dispose () {
    clearTimeout(initTimer)
    html.removeEventListener('mouseleave', handleMouseleave);
    html.removeEventListener('mouseenter', handleMouseenter);
    html.removeEventListener('keydown', handleKeydown);
  }

  return dispose
}
