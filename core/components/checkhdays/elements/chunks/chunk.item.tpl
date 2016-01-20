<div class="container">
    <form id="checkform" action="" method="post" class="form-inline">
        <div class="form-group">
            <input id="check_id" class="form-control" type="textfield" value="[[+Date]]" name="Date" placeholder="Date">
            <button id="check_btn" class="btn btn-default" type="submit">Отправить</button>
        </div>
    </form>
    <p id="check_response"></p>
</div>
<script>
    $(document).ready(function () {
        $('#checkform').submit(function () {
            var send = $('#check_id').val();
            $('#check_response').empty();
            $.ajax({
                url: '[[++site_url]]' + 'ajaxcheckhdays' + '[[+Content_type]]',
                data: {send},
                type: 'POST',
                success: function (response) {
                    $('#check_response').append(response);
                }
            });
            return false;
        });
    });
</script>