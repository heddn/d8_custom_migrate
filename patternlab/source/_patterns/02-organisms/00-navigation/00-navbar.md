---
title: Navigation Bar
---

Default navbar
  <p>Navbars are responsive meta components that serve as navigation headers for your application or site. They begin collapsed (and are toggleable) in mobile views and become horizontal as the available viewport width increases.</p>
  <p><strong class="text-danger">Justified navbar nav links are currently not supported.</strong></p>

    <h4>Overflowing content</h4>
    <p>Since Bootstrap doesn't know how much space the content in your navbar needs, you might run into issues with content wrapping into a second row. To resolve this, you can:</p>
    <ol type="a">
      <li>Reduce the amount or width of navbar items.</li>
      <li>Hide certain navbar items at certain screen sizes using <a href="../css/#responsive-utilities">responsive utility classes</a>.</li>
      <li>Change the point at which your navbar switches between collapsed and horizontal mode. Customize the <code>@grid-float-breakpoint</code> variable or add your own media query.</li>
    </ol>

	<p>If JavaScript is disabled and the viewport is narrow enough that the navbar collapses, it will be impossible to expand the navbar and view the content within the <code>.navbar-collapse</code>.</p>
    <p>The responsive navbar requires the <a href="../javascript/#collapse">collapse plugin</a> to be included in your version of Bootstrap.</p>

    <h4>Changing the collapsed mobile navbar breakpoint</h4>
    <p>The navbar collapses into its vertical mobile view when the viewport is narrower than <code>@grid-float-breakpoint</code>, and expands into its horizontal non-mobile view when the viewport is at least <code>@grid-float-breakpoint</code> in width. Adjust this variable in the Less source to control when the navbar collapses/expands. The default value is <code>768px</code> (the smallest "small" or "tablet" screen).</p>

    <h4>Make navbars accessible</h4>
    <p>Be sure to use a <code>&lt;nav&gt;</code> element or, if using a more generic element such as a <code>&lt;div&gt;</code>, add a <code>role="navigation"</code> to every navbar to explicitly identify it as a landmark region for users of assistive technologies.</p>