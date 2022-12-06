<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token()}}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pages/event.css') }}" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

  <!-- SCRIPTS -->
  <script type="text/javascript" src="{{ asset('js/app.js') }}" defer> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

</head>

<body>

  @include('layouts.Navbar')
  <main>
    <section id="content">
      @yield('content')
    </section>
  </main>

  <script type="text/javascript">
    document.getElementById("searchInput").addEventListener("keyup", function(e) {
      fetch("search" + "?" + new URLSearchParams({
        search: e.target.value
      }), {
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json",
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-Token": '{{ csrf_token() }}'
        },
        method: "get",
        credentials: "same-origin",
      }).then(function(data) {
        return data.json();
      }).then(function(data) {
        console.log(data);
        let container = document.getElementById("table-res");
        container.innerHTML = "";
        data.forEach(function(event) {
          let row = document.createElement("tr");
          let name = document.createElement("td");
          let city = document.createElement("td");
          let link = document.createElement("a");
          link.href = "/event" + event.eventid;
          link.classList.add("link-dark");
          link.innerHTML = event.name;
          name.appendChild(link);
          city.innerHTML = event.city_name;
          row.appendChild(name);
          row.appendChild(city);
          container.appendChild(row);
        });

      }).catch(function(error) {
        console.log(error);
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx " crossorigin="anonymous "></script>
</body>

</html>