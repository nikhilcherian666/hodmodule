<?php
include("../includes/connection1.php");
include("../includes/report_errors.php");
if(isset($_POST["key"])): ?>
    <?php  if($_POST["key"] != ''): ?>
        <div class="row">
            <div class="col-md-12 pull-right text-right">
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#indran" style=" margin-bottom: 2pc; ">bulk verification </button>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
    <div class="table-responsive">
        <table   class="table table-hover DataTable" >
            <thead>
                <tr>
                    <th style="text-align: center;">ADMISSION NUMBER</th>
                    <th style="text-align: center;">NAME</th>
                    <th style="text-align: center;">CURRENT SEM</th>
                    <th style="text-align: center;">NEXT SEM</th>
                    <!-- <th style="text-align: center;">APPLICATION STATUS</th>
                    <th style="text-align: center;">REMARK</th> -->
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                <td align="center">123</td>
                <td align="center">nikhil</td>
                <td align="center">4</td>
                <td align="center">5</td>

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="indran" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form method="post" action=" " id="bulk-ok-form" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">bulk verification</h4>
          </div>
          <div class="modal-body">
            <p></p>
            <div class="row">
                <div class="col-md-6 text-left pull-left">
                    <input type="hidden" name="bulk" value="true">
                    <button type="button"  class="text-uppercase btn btn-sm btn-info check-all">check all</button>
                </div>  
                <div class="col-md-6 text-right pull-right">
                    <input type="hidden" name="bulk" value="true">
                    <button type="submit"  class="text-uppercase btn btn-sm btn-warning">go</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style=" padding: 0 15px; ">

                    <table   class="table table-hover " >
                        <thead>
                            <tr>
                                <th class="col-md-2">ADM NO</th>
                                <th >NAME</th>
                                <th  >C-SEM</th>
                                <th  >N-SEM</th> 
                                <th class="col-md-4 text-uppercase text-right">Verify</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        </table> 
                </div>
            </div>
        </div>
        </form>
</div>
</div>
<div>
