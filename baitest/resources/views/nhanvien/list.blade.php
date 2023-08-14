<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>list</title>
</head>

<body>
    <p>Tạo mới nhân viên</p> <a href="{{ route('add') }}"><button>Add</button></a>
    @if (Session::has('success'))
        <div style="color: blue">{{ Session::get('success') }}</div>
    @endif
    <form action="{{ route('search') }}" method="post">
        @csrf

        <label for="">Tìm kiếm nhân viên theo tên</label>
        <input type="text" name="search">
        <button>Tìm kiếm</button>
    </form>

    <table border="1">
        <tr>
            <td>ID</td>
            <td>Tên</td>
            <td>Email</td>
            <td>Tel</td>
            <td>Thao tác</td>
        </tr>
        @foreach ($nhanviens as $nhanvien)
            <tr>
                <td>{{ $nhanvien->id }}</td>
                <td>{{ $nhanvien->ten }}</td>
                <td>{{ $nhanvien->email }}</td>
                <td>{{ $nhanvien->tel }}</td>
                <td><a href="{{ route('edit', ['id' => $nhanvien->id]) }}"><button>Sua</button></a></td>
            </tr>
        @endforeach
    </table>

    <div>
        @php
            $start = $currentPage - (($currentPage - 1) % 3);
            $end = min($start + 2, $nhanviens->lastPage());
        @endphp

        @if ($nhanviens->previousPageUrl())
            @if ($currentPage > 3)
                <a href="{{ $nhanviens->url($start - 1) }}">&lt;&lt;</a>
            @else
                <a href="{{ $nhanviens->url(1) }}">&lt;&lt;</a>
            @endif
        @endif
        @for ($i = $start; $i <= $end; $i++)
            @if ($currentPage == $i)
                <span> {{ $i }} </span>
            @else
                <a href="{{ $nhanviens->url($i) }}">{{ $i }}</a>
            @endif
        @endfor
        @if ($nhanviens->nextPageUrl())
            @if ($currentPage < $nhanviens->lastPage() - 2)
                <a href="{{ $nhanviens->url($end + 1) }}">&gt;&gt;</a>
            @else
                <a href="{{ $nhanviens->url($nhanviens->lastPage()) }}">&gt;&gt;</a>
            @endif
        @endif
    </div>
</body>

</html>
