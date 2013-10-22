<style>
.show-grid [class^="col-"] {
padding-top: 10px;
padding-bottom: 10px;
background-color: #eee;
border: 1px solid #ddd;
background-color: rgba(86,61,124,.15);
border: 1px solid rgba(86,61,124,.2);
}
</style>
Here is the grid
<div class="row show-grid">
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
</div>
<div class="row show-grid">
  <div class="col-md-8">.col-md-8</div>
  <div class="col-md-4">.col-md-4</div>
</div>
<div class="row show-grid">
  <div class="col-md-4">.col-md-4</div>
  <div class="col-md-4">.col-md-4</div>
  <div class="col-md-4">.col-md-4</div>
</div>
<div class="row show-grid">
  <div class="col-md-6">.col-md-6</div>
  <div class="col-md-6">.col-md-6</div>
</div>

movile grid:
<div class="row show-grid">
  <div class="col-xs-12 col-sm-6 col-md-8">.col-xs-12 .col-sm-6 .col-md-8</div>
  <div class="col-xs-6 col-sm-6 col-md-4">.col-xs-6 .col-sm-6 .col-md-4</div>
</div>
<div class="row show-grid">
  <div class="col-xs-6 col-sm-4 col-md-4">.col-xs-6 .col-sm-4 .col-md-4</div>
  <div class="col-xs-6 col-sm-4 col-md-4">.col-xs-6 .col-sm-4 .col-md-4</div>
  <!-- Optional: clear the XS cols if their content doesn't match in height -->
  <div class="clearfix visible-xs"></div>
  <div class="col-xs-6 col-sm-4 col-md-4">.col-xs-6 .col-sm-4 .col-md-4</div>
</div>
