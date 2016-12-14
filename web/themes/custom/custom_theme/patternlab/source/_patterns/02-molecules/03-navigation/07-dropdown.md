---
title: Dropdown
---

  <h1 id="dropdowns" class="page-header">Dropdowns</h1>

  <p class="lead">Toggleable, contextual menu for displaying lists of links. Made interactive with the <a href="../javascript/#dropdowns">dropdown JavaScript plugin</a>.</p>

  <h2 id="dropdowns-example">Example</h2>
  <p>Wrap the dropdown's trigger and the dropdown menu within <code>.dropdown</code>, or another element that declares <code>position: relative;</code>. Then add the menu's HTML.</p>

  <h2 id="dropdowns-alignment">Alignment</h2>
  <p>By default, a dropdown menu is automatically positioned 100% from the top and along the left side of its parent. Add <code>.dropdown-menu-right</code> to a <code>.dropdown-menu</code> to right align the dropdown menu.</p>
  <div class="bs-callout bs-callout-warning" id="callout-dropdown-positioning">
    <h4>May require additional positioning</h4>
    <p>Dropdowns are automatically positioned via CSS within the normal flow of the document. This means dropdowns may be cropped by parents with certain <code>overflow</code> properties or appear out of bounds of the viewport. Address these issues on your own as they arise.</p>
  </div>
  <div class="bs-callout bs-callout-warning" id="callout-dropdown-pull-right">
    <h4>Deprecated <code>.pull-right</code> alignment</h4>
    <p>As of v3.1.0, we've deprecated <code>.pull-right</code> on dropdown menus. To right-align a menu, use <code>.dropdown-menu-right</code>. Right-aligned nav components in the navbar use a mixin version of this class to automatically align the menu. To override it, use <code>.dropdown-menu-left</code>.</p>
  </div>