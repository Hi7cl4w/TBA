<div class="modal-content">
    <div class="modal-header">
        <?php $user=Auth::user() ?>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">{{ $message['head']}}</h4>
    </div>
    <div class="modal-body">

        <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>{{ $message['body'] }}</div>

    </div>
    <div class="modal-footer ">
        <form class="" method="POST" id="new-ticket-form"
              action="{{$message['url']}}">
            <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
            <input type="hidden" name="id" value="{{$message['id']}}">
        <button type="submit" id="" name="yes" value="" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <form>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
    </div>
</div>
