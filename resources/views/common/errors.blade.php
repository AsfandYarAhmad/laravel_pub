@if ($errors->has('updateName') || $errors->has('updateDate') || $errors->has('updateTime'))
@if (count($errors) > 0)
<!-- Form Error List -->
<div class="alert alert-danger mt-3">
    <strong>Whoops! Something went wrong!</strong>
    <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endif