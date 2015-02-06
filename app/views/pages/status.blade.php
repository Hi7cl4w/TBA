
    <div class="modal-dialog">
        <div class="modal-content">
    <div class="modal-header">
        <?php $user=Auth::user() ?>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Change Status</h4>
    </div>
    <div class="modal-body">

        Change the Status of this Ticket
        <div class="row form-row">
            <div class="col-md-12">
                                <textarea class="" rows="10" cols="50"id="Feedback{{$message['id']}}" name="Feedback"></textarea>
            </div>
        </div>

    </div>
    <div class="modal-footer ">

        <button type="button" id="{{$message['id']}}" name="yes" value="" class="btn btn-success  feedbackbutton" ><span class="glyphicon glyphicon-ok-sign"></span> Submit</button>

        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
    </div>
</div>
        </div>
