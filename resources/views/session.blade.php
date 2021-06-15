@if(Session::has('success'))
    <div class="alert alert-primary" role="alert">{{Session::get('success')}}
        <span class="close" style="float: right"><a href="#">x</a></span>
    </div>
@endif

@if(Session::has('failed'))
    <div class="alert alert-danger" role="alert">{{Session::get('failed')}}
        <span class="close" style="float: right"><a href="#">x</a></span>
    </div>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).on('click', '.close', function () {
        $('.alert').hide();
    });
</script>
