<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
</head>
<body>
    <h1>Calculator</h1>

    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    <form method="post" action="{{ route('calculate.calculate') }}">
        @csrf
        <input type="text" name="num_1" value="{{old('num_1')}}" placeholder="Operand 1" required>
        <select name="operation">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="num_2" value="{{old('num_2')}}"  placeholder="Operand 2" required>
        <button type="submit">Calculate</button>
    </form>

    @isset($result)
        <h2>Result: {{ $result }}</h2>
    @endisset
</body>
</html>
