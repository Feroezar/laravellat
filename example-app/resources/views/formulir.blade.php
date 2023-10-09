<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toturial Laravel - LP3I</title>
</head>
<body>
    <form action="/formulir/proses" method="get">
        <input type="hidden" name="_token" value="<?= csrf_token()?>">

        Nama :
        <input type="text" name="nama"><br/>
        Alamat :
        <input type="text" name="alamat"><br/>
        <input type="Submit" value="simpan">
    </form>
</body>
</html>