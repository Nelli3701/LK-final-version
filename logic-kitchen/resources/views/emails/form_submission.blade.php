<!DOCTYPE html>
<html lang="en">

<head>
    <title>Новое сообщение с формы сайта</title>
</head>

<body>
    <h1>Новое сообщение с формы</h1>
    <p><strong>Имя:</strong> {{ $name }}</p>
    <p><strong>Телефон:</strong> {{ $phone }}</p>

    @if(isset($gift))
    <p><strong>Подарок:</strong> {{ $gift }}</p>
    @endif
</body>

</html>