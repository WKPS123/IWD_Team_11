/*jslint browser: true*/
/*global define, module, exports*/
(function (root, factory) {
  "use strict";
  if (typeof define === "function" && define.amd) {
    define([], factory);
  } else if (typeof exports === "object") {
    module.exports = factory();
  } else {
    root.Progress = factory();
  }
})(this, function () {
  "use strict";
  var $w = window,
    $d = document,
    $circ = document.querySelector(".animated-circle"),
    $progCount = document.querySelector(".progress-count"),
    init,
    wh,
    h,
    sHeight;

  function trigger(eventName) {
    var event = $d.createEvent("HTMLEvents");
    event.initEvent(eventName, true, false);

    $w.dispatchEvent(event);
  }

  function updateProgress(perc) {
    var circle_offset = 126 * perc;

    $circ.style.strokeDashoffset = 126 - circle_offset;

    $progCount.innerHTML = Math.round(perc * 100) + "%";

    // Send the progress data to the server using AJAX
    saveProgressToServer(perc);
  }

  function saveProgressToServer(percentage) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "save_progress.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Progress saved successfully, handle any response from the server if needed
      }
    };
    xhr.send("progress=" + encodeURIComponent(percentage));
  }

  function setSizes() {
    wh = $w.innerHeight;
    h = $d.body.offsetHeight;

    sHeight = h - wh;
  }

  function handler() {
    setSizes();
    trigger("scroll");
  }

  init = function () {
    var events = ["DOMContentLoaded", "load", "resize"],
      top,
      perc;

    setSizes();

    $w.addEventListener(
      "scroll",
      function () {
        top = this.pageYOffset || $d.documentElement.scrollTop;
        perc = Math.max(0, Math.min(1, top / sHeight));

        updateProgress(perc);
      },
      false
    );

    events.map(function (event) {
      $w.addEventListener(event, handler, false);
    });
  };

  return {
    init: init,
  };
});
