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
                <center class="mdl-cell mdl-cell--6-col mdl-cell--3-offset" style="margin-top:40px">
                  <img src="/images/squid-bolt.png" class="navlogo">
                <h1 class=>{{$exception->getMessage()}}</h1>
                <p class="">This is likely to be caused by a very specific keyword.</p>
                <p class="">Try refreshing below, this may fix the issue. If not please try a different keyword</p>
                <button onclick="window.location.reload();"class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored">
                    <i class="material-icons">autorenew</i>
                </button>
                </center>

              <!-- <h2>{{ $exception->getMessage() }}</h2> -->

          </div>
          </div>
  </div>
  @include('layouts.foot')
</body>

</html>
