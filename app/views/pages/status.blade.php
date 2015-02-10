<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <?php $user = Auth::user() ?>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 class="modal-title custom_align" id="Heading">Ticket ID <b> : TI{{$message['id']}}</b></b></h3>
        </div>
        <div class="modal-body">


            <div class="row form-row">
                <div class="col-md-12">
                    <div class="row column-seperation">
                        <div class="col-md-6">
                            <label>Change Status</label>
                            <select id="status" class="form-control" name="Product_id" style="width:100%">
                                <option  <?php if ($message['status']['Status'] == "Processing") echo 'selected'; ?>
                                        value="Processing">Processing
                                </option>
                                <option  <?php if ($message['status']['Status'] == "Pending") echo 'selected'; ?>
                                        value="Pending">Pending
                                </option>
                                <option  <?php if ($message['status']['Status'] == "Onhold") echo 'selected'; ?>
                                        value="Onhold">On Hold
                                </option>
                                <option  <?php if ($message['status']['Status'] == "Completed") echo 'selected'; ?>
                                        value="Completed">Completed
                                </option>

                                @if ($user->hasRole('Administrator')  )
                                    <option  <?php if ($message['status']['Status'] == "Closed") echo 'selected'; ?>
                                            value="Closed">Closed
                                    </option>
                                @endif

                            </select>


                            <div class="row form-row">
                                <div class="col-md-12">
                                    <label>Remark</label>
                                    <input class="form-control"
                                           placeholder="remark"
                                           type="text"
                                           name="Remark" id="remark">
                                </div>
                            </div>


                        </div>
                        @if ($user->hasRole('Administrator'))
                        <div class="col-md-6">
                            <label>Change Assigned Staff</label>
                            <select id="staff" class="form-control" name="staff_id" style="width:100%">
                                @foreach($message['staff'] as $staff)

                                    {{ "<option value='".$staff['id']."'> ".$staff['fname']." ".$staff['lname']."</option>"}}
                                @endforeach

                            </select>


                    </div>
                            @endif
                    </div>
                        <div class="modal-footer col-md-12">
                            <div class="col-md-6">
                                <button type="button" id="submitstatus{{$message['id']}}" name="yes" value=""
                                        class="btn btn-success feedbackbutton"><span class="glyphicon glyphicon-ok-sign"></span>
                                    Change Status
                                </button>
                            </div>
                              @if ($user->hasRole('Administrator'))
                            <div class="col-md-6">
                            <button type="button" id="submitstaff{{$message['id']}}" name="yes" value=""
                                    class="btn btn-success feedbackbutton"><span class="glyphicon glyphicon-ok-sign"></span>
                                Change Staff
                            </button>



                        </div>
                                  @endif

                        </div>



            </div>
        </div>
        <script>


        </script>
