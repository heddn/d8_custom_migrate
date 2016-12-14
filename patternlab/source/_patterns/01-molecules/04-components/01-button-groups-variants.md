---
title: Button Groups
---

  <p class="lead">Group a series of buttons together on a single line with the button group. Add on optional JavaScript radio and checkbox style behavior with <a href="../javascript/#buttons">our buttons plugin</a>.</p>

  <div class="bs-callout bs-callout-warning" id="callout-btn-group-tooltips">
    <h4>Tooltips &amp; popovers in button groups require special setting</h4>
    <p>When using tooltips or popovers on elements within a <code>.btn-group</code>, you'll have to specify the option <code>container: 'body'</code> to avoid unwanted side effects (such as the element growing wider and/or losing its rounded corners when the tooltip or popover is triggered).</p>
  </div>

  <div class="bs-callout bs-callout-warning" id="callout-btn-group-accessibility">
    <h4>Ensure correct <code>role</code> and provide a label</h4>
    <p>In order for assistive technologies – such as screen readers – to convey that a series of buttons is grouped, an appropriate <code>role</code> attribute needs to be provided. For button groups, this would be <code>role="group"</code>, while toolbars should have a <code>role="toolbar"</code>.</p>
    <p>One exception are groups which only contain a single control (for instance the <a href="#btn-groups-justified">justified button groups</a> with <code>&lt;button&gt;</code> elements) or a dropdown.</p>
    <p>In addition, groups and toolbars should be given an explicit label, as most assistive technologies will otherwise not announce them, despite the presence of the correct <code>role</code> attribute. In the examples provided here, we use <code>aria-label</code>, but alternatives such as <code>aria-labelledby</code> can also be used.</p>
  </div>