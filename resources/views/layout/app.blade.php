<?php
    $pages = array( 'search', 'slices', 'compare', 'help' );
?>

<!DOCTYPE html>

<html>
  <head>
    <title>jPOST Database</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/tabulator.min.css" rel="stylesheet">
    <link href="css/select2.min.css" rel="stylesheet">
    <link href="css/jpost.css" rel="stylesheet">

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.numeric.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/tabulator.min.js"></script>
    <script src="js/select2.full.min.js"></script>
    <script src="js/FileSaver.min.js"></script>
    <script src="js/jpost.js"></script>
    <script src="js/jpost-slice.js"></script>
    <script>
        jPost.loadSlices();
    </script>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index">jPOST Database</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
          <ul id="header-menu" class="nav navbar-nav">
@foreach( $pages as $page )
    @if( $page == $name )
             <li class="active"><a href="{{ $page }}">{{ ucfirst( $page ) }}</a></li>
    @else
             <li><a href="{{ $page }}">{{ ucfirst( $page ) }}</a></li>
    @endif
@endforeach
          </ul>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">jPOST</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
          <ul id="header-menu" class="nav navbar-nav">
          </ul>
        </div>
      </div>
    </nav>

    <input type="hidden" id="slice-name" value="{{ $slice }}" >

    <div class="container">
        @yield( 'content' )
    </div>

    <div id="dialog-slice-selection" class="modal fade dialog-slice-selection">
      <div class="modal-dialog dialog-slice-selection">
        <div class="modal-content" style="padding: 15px;">
          <div class="modal-header">
            <h4 class="modal-title">Select Slice</h4>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-2">Slice</label>
              <select id="select-slice" name="slice" class="form-control col-10 dialog-slice-selection">
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default dialog-slice-selection" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary dialog-slice-selection" onClick="jPost.onCloseSliceSelectionDialog()">OK</button>
          </div>
        </div>
      </div>
    </div>

    <div id="dialog-slice-selection" class="modal fade dialog-slice-selection">
      <div class="modal-dialog dialog-slice-selection">
        <div class="modal-content" style="padding: 15px;">
          <div class="modal-header">
            <h4 class="modal-title">Select Slice</h4>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-2">Slice</label>
              <select id="select-slice" name="slice" class="form-control col-10 dialog-slice-selection">
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default dialog-slice-selection" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary dialog-slice-selection" onClick="jPost.onCloseSliceSelectionDialog()">OK</button>
          </div>
        </div>
      </div>
    </div>

    <div id="dialog-slice" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content" style="padding: 15px;">
          <div class="modal-header">
            <h4 class="modal-title">New Slice</h4>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-2">Slice Name</label>
              <input type="text" id="dialog-slice-name" name="name" required class="form-control col-10" value="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" onClick="jPost.addNewSlice()">Add</button>
          </div>
        </div>
      </div>
    </div>

    <form id="common-form" method="get">
      {{ csrf_field() }}
    </form>
    <div id="tmp" style="display: none;">
    </div>


  </body
</html>
