<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- <style>
        @page{
            size: A4;
        }

        @page :left {
        margin-left: 3cm;
        }

        @page :right {
        margin-left: 4cm;
        @bottom-left {
            margin: 10pt 0 30pt 0;
            border-top: .25pt solid #666;
            content: "My book";
            font-size: 9pt;
            color: #333;
        }
        }

        @page :blank {
            @top-center { content: "This page is intentionally left blank." }
        }

    </style> --}}
</head>
<body>
    <table border="1">
        <tbody>
            @foreach(range(0,100) as $i)
                <tr>
                    <td>orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the in</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
