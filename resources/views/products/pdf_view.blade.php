<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
 <title>{{ $title }}</title>
</head><body>
  <h1>{{ $heading}}</h1>
  <div>
    <table border="1">
        <tr>
          <th>Tag</th>
          <th>Produtos</th>
        </tr>
        @foreach ($content as $item)
            <tr>
                <td>{{ $item->tag}}</td>
                <td>{{ $item->produto}}</td>
            </tr>
        @endforeach
    </table>
  </div>
</body></body>
</html>