<form action="/dev/workspace/web/todo/admin/promote" method="post">
    <div class="ltr">
        <div class="tal">
            <input class="inp ltr" style="width: 130px;" name="userId" type="text" placeholder="User ID" id="userId"><br>
            <br>
            <input class="inp ltr" name="access" type="text" id="access" placeholder="Access Names ( Seperated By , )">
            <br>
            <button class="btn" style="padding-top: 9px" type="submit">Promote</button>
        </div>
    </div>
</form>

<script>

    $(function(){
        $('#userId').on('keyup', function(){
            var value = $(this).val();
            $.ajax('/dev/workspace/web/todo/admin/getUserAccess/' + value, {
               dataType: 'json',
               success: function(data){
                   var access = data.access.replaceAll(/\|/g, ',', data.access);
                   access = access.substring(1, access.length - 1);
                   $('#access').val(access);
               }
            });
        });
    });

</script>
