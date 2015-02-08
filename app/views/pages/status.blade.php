
    <div class="modal-dialog">
        <div class="modal-content">
    <div class="modal-header">
        <?php $user=Auth::user() ?>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title custom_align" id="Heading">Ticket ID <b> : TI{{$message['id']}}</b></b></h3>
    </div>
    <div class="modal-body">


        <div class="row form-row">
            <div class="col-md-12">
                <label>Change Status</label>
                <select id="Product_id" class="form-control" name="Product_id" style="width:100%">
                    <option value="Processing">Processing</option>
                    <option value="Pending">Pending</option>
                    <option value="Delayed">Delayed</option>
                    <option value="Completed">Completed</option>
                    <option value="Closed">Closed</option>

                </select>

            </div>



            </div>
        <div class="row form-row">
            <div class="col-md-12">
                <label>Remark</label>
                <input class="form-control"
                       placeholder="remark"
                       type="text"
                       name="Remark" id="email" >
            </div>
        </div>
        </div>


    <div class="modal-footer ">

        <button type="button" id="status{{$message['id']}}" name="yes" value="" class="btn btn-success feedbackbutton" ><span class="glyphicon glyphicon-ok-sign"></span> Submit</button>

        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
    </div>
</div>
        </div>
