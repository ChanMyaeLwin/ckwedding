<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{$attach_file_name}}</title>
    <style>
          footer {
            font-size: 12px;
            position: fixed;
            bottom: 10;
            text-align: right;
        }
        
    </style>
</head>
<body>
    <div>
        <img 
            src="{{asset('images/attachFile')}}/{{ $attach_file_type }}" 
            width="50%">
    </div>
    <footer>
       
        <p>Print By : {{$user_name}} | Print On : {{ now(); }}</p>
    </footer>
</body>

</html>