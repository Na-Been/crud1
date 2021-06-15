<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Import File') }}
                    <span style="float: right">
                    <a href="{{route('users.create')}}">
                        {{__('Go Back')}}
                    </a>
                </span>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-2">
                        Name
                    </div>
                    <div class="col-md-8 mt-2">
                        {{$user->name}}
                    </div>
                    <div class="col-md-4 mt-2">
                        Gender
                    </div>
                    <div class="col-md-8 mt-2">
                        {{$user->gender}}
                    </div>
                    <div class="col-md-4 mt-2">
                        Phone
                    </div>
                    <div class="col-md-8 mt-2">
                        {{$user->phone}}
                    </div>
                    <div class="col-md-4 mt-2">
                        Email
                    </div>
                    <div class="col-md-8 mt-2">
                        {{$user->email}}
                    </div>
                    <div class="col-md-4 mt-2">
                        Address
                    </div>
                    <div class="col-md-8 mt-2">
                        {{$user->address}}
                    </div>
                    <div class="col-md-4 mt-2">
                        Nationality
                    </div>
                    <div class="col-md-8 mt-2">
                        {{$user->nation}}
                    </div>
                    <div class="col-md-4 mt-2">
                        Date Of Birth
                    </div>
                    <div class="col-md-8 mt-2">
                        {{$user->dob}}
                    </div>
                    <div class="col-md-4 mt-2">
                        Educational Background
                    </div>
                    <div class="col-md-8 mt-2">
                        {{$user->ed_bg}}
                    </div>
                    <div class="col-md-4 mt-2">
                        Contact Mode
                    </div>
                    <div class="col-md-8 mt-2">
                        {{$user->contact_mode}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).on('keyup change', '#phone,#email', function () {
        // $('#displayName').empty();
        var email = $('#email').val();
        var phone = $('#phone').val();

        $('#contact-mode')
            .html([$("<option></option>")
                .attr("value", email),
                $("<option></option>")
                    .attr("value", phone)
            ]);
    });
</script>

</body>
</html>
