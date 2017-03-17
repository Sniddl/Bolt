<!--
    ____  ____  __  ______
   / __ )/ __ \/ / /_  __/
  / __  / / / / /   / /
 / /_/ / /_/ / /___/ /
/_____/\____/_____/_/
BY FMWK aka. Sys
 -->

<html lang="en">
  <head>
      <title>Bolt - Home</title>
      @include('layouts.header')
  </head>
  <body>
    <!-- <div id="wrap"> -->
        <div class="navigation">
            @include('layouts.nav')
        </div>
        <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div id="entry" class="col-md-6" style="display:none;">
            <center style="padding: 10px"><img src="images/squid-bolt.png" class="navlogo"></center>
                <form action="/result" method="POST">
                  {{ csrf_field() }}
                    <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" name="code" id="code" required value="{{ old('code') }}">
                    <label class="mdl-textfield__label" id="code-label" for="user">Post code</label>
                    <span class="mdl-textfield__error" id="code-span"></span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="number" name="number" id="number" required value="{{ old('number') }}">
                    <label class="mdl-textfield__label" id="num-label" for="user">How many lucky souls?</label>
                    <span class="mdl-textfield__error" id="num-span"></span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" name="keyword" id="keyword" value="{{ old('keyword') }}">
                    <label class="mdl-textfield__label" for="user">Keyword</label>
                    </div>
                    <button style="float:right" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Go</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div id="entry-thankyou" class="col-md-6" style="display:none;">
              <center><p>Thank you for visiting Bolt. If you have a bug/suggestion feel free to contact me on Reddit. Link top-right<p></center>
            </div>
        </div>
        </div>
    <!-- </div> -->
    <!-- <div id="entry-thankyou" class="col-md-6" style="display:none;">
      <center><p>Thank you for visiting Bolt. If you have a bug/suggestion feel free to contact me on Reddit. Link top-right<p></center>
    </div> -->
    @include('layouts.foot')
  </body>
</html>
