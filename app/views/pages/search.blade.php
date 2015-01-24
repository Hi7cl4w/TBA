

{{ HTML::style('assets/css/bootstrap.min.css') }}


{{HTML::style('assets/js/jquery-ui-1.11.2/jquery-ui.min.css')}}
{{HTML::script('assets/js/jquery-2.1.3.min.js')}}
{{HTML::script('assets/js/jquery-ui-1.11.2/jquery-ui.min.js')}}
{{HTML::script('assets/js/pace.min.js')}}
{{HTML::script('assets/js/bootstrap.min.js')}}
{{HTML::script('assets/js/metro/MetroJs.min.js')}}
{{HTML::script('assets/js/jquery.smoothState.js')}}
{{HTML::script('assets/js/app.js')}}
    <title>Login</title>

    <!-- Main Title -->
    <div class="row wrapper h-align-middle">
    <div class="col-md-12">
      s
        <input class="form-control input-sm" type="text" id="search" name="auto" >
        <select id="emptyDropdown">
            <option value="0">R8</option>
            <option value="1">Quattro</option>
            <option value="2">A6 hatchback</option>
        </select>
</div>

    </div>
        </div>

    <script>
        $('#search').autocomplete({
            source : 'getdata',
            minLength : 1,
            select:function(e,ui){
                console.log('selected');

            }
        });





    </script>





