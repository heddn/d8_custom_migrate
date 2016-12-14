---
title: Navs
---

  <p class="lead">Navs available in Bootstrap have shared markup, starting with the base <code>.nav</code> class, as well as shared states. Swap modifier classes to switch between each style.</p>

  <div class="bs-callout bs-callout-info" id="callout-navs-tabs-plugin">
    <h4>Using navs for tab panels requires JavaScript tabs plugin</h4>
    <p>For tabs with tabbable areas, you must use the <a href="../javascript/#tabs">tabs JavaScript plugin</a>. The markup will also require additional <code>role</code> and ARIA attributes – see the plugin's <a href="../javascript/#tabs-usage">example markup</a> for further details.</p>
  </div>

  <div class="bs-callout bs-callout-warning" id="callout-navs-accessibility">
    <h4>Make navs used as navigation accessible</h4>
    <p>If you are using navs to provide a navigation bar, be sure to add a <code>role="navigation"</code> to the most logical parent container of the <code>&lt;ul&gt;</code>, or wrap a <code>&lt;nav&gt;</code> element around the whole navigation. Do not add the role to the <code>&lt;ul&gt;</code> itself, as this would prevent it from being announced as an actual list by assistive technologies.</p>
  </div>