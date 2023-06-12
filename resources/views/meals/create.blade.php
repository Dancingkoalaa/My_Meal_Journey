@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">test</div>

                <div class="card-body">
                  <form action="{{ route('meals.store') }}" method="post">
                    {{ csrf_field() }}
                    Maaltijd:
                    <br />
                    <input type="text" name="name" />
                    <br /><br />
                    Beschrijving:
                    <br />
                    <textarea name="description"></textarea>
                    <br /><br />
                    Datum:
                    <br />
                    <input type="text" name="meal_date" class="date" />
                    <br /><br />
                    Tijd:
                    <br />
                    <input type="time" name="meal_time" class="time" />
                    <br /><br />
                    <input type="submit" value="Save" />
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>
@endsection