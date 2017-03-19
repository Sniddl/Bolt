<!--
    ____  ____  __  ______
   / __ )/ __ \/ / /_  __/
  / __  / / / / /   / /
 / /_/ / /_/ / /___/ /
/_____/\____/_____/_/
BY SNIDDL
 -->

<html lang="en">
<head>

    <title>Bolt - Error</title>
    @include('layouts.header')
</head>
<body>
  <div id="wrap">
      <div class="navigation">
          @include('layouts.nav')
      </div>
          <div class="container">
          <div class="row">

              {{$status}}

          </div>
          </div>
  </div>
  @include('layouts.foot')
</body>

</html>
