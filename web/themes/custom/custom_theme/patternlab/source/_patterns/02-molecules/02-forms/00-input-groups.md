---
title: Input Groups
---

  <p class="lead">Extend form controls by adding text or buttons before, after, or on both sides of any text-based <code>&lt;input&gt;</code>. Use <code>.input-group</code> with an <code>.input-group-addon</code> to prepend or append elements to a single <code>.form-control</code>.</p>

    <h4>Textual <code>&lt;input&gt;</code>s only</h4>
    <p>Avoid using <code>&lt;select&gt;</code> elements here as they cannot be fully styled in WebKit browsers.</p>
    <p>Avoid using <code>&lt;textarea&gt;</code> elements here as their <code>rows</code> attribute will not be respected in some cases.</p>

    <h4>Tooltips &amp; popovers in input groups require special setting</h4>
    <p>When using tooltips or popovers on elements within an <code>.input-group</code>, you'll have to specify the option <code>container: 'body'</code> to avoid unwanted side effects (such as the element growing wider and/or losing its rounded corners when the tooltip or popover is triggered).</p>

    <h4>Don't mix with other components</h4>
    <p>Do not mix form groups or grid column classes directly with input groups. Instead, nest the input group inside of the form group or grid-related element.</p>

    <h4>Always add labels</h4>
    <p>Screen readers will have trouble with your forms if you don't include a label for every input. For these input groups, ensure that any additional label or functionality is conveyed to assistive technologies.</p>
    <p>The exact technique to be used (<code>&lt;label&gt;</code> elements hidden using the <code>.sr-only</code> class, or use of the <code>aria-label</code>, <code>aria-labelledby</code>, <code>aria-describedby</code>, <code>title</code> or <code>placeholder</code> attribute) and what additional information will need to be conveyed will vary depending on the exact type of interface widget you're implementing. The examples in this section provide a few suggested, case-specific approaches.</p>
    
    <h2 id="input-groups-basic">Basic example</h2>
  <p>Place one add-on or button on either side of an input. You may also place one on both sides of an input.</p>
  <p><strong class="text-danger">We do not support multiple add-ons on a single side.</strong></p>
  <p><strong class="text-danger">We do not support multiple form-controls in a single input group.</strong></p>
