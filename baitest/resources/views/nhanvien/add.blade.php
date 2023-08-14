<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Đăng ký nhân viên mới</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red">{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @if (Session::has('success'))
        <div style="color: blue">{{Session::get('success')}}</div>
        
    @endif
    <form action="{{route('add')}}" method="post">
        @csrf
        <div>
            <label for="">Tên</label>
            <input type="text" name="ten">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name="email">
        </div>
        <div>
            <label for="">Tel</label>
            <input type="text" name="tel">
        </div>
        <button>Thêm</button>
    </form>
</body>
</html>