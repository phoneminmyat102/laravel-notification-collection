<form action="" method="POST">
    {{ csrf_field()}}
    <input type="text" name="name" id="name">
    <input type="submit" value="Submit">
</form>