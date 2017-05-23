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
                <form action="/result" method="POST">
                  {{ csrf_field() }}
                    <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" name="code" id="code" required value="{{ old('code') }}">
                    <label class="mdl-textfield__label" id="code-label" for="user">Post Code <small style="opacity: .5">(ex. 5xtp6y)</small></label>
                    <span class="mdl-textfield__error" id="code-span"></span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="number" name="number" id="number" required value="{{ old('number') }}">
                    <label class="mdl-textfield__label" id="num-label" for="user">How many lucky souls? <small style="opacity: .5">(ex. 5)</small></label>
                    <span class="mdl-textfield__error" id="num-span"></span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" name="keyword" id="keyword" value="{{ old('keyword') }}">
                    <label class="mdl-textfield__label" for="user">Keyword <small style="opacity: .5">(ex. Car)</small></label>
                    </div>


                    <!-- <br>
                    <div style="margin-top: 40px">
                      Advanced Options
                    </div>
                    <hr>
                    <div class="mdl-textfield mdl-js-textfield ">
                    <input class="mdl-textfield__input" type="number" name="karma" id="karma" value="{{ old('karma') }}">
                    <label class="mdl-textfield__label" for="user">Comment Karma</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield ">
                    <input class="mdl-textfield__input" type="number" name="age" id="age" value="{{ old('age') }}">
<<<<<<< HEAD
                    <label class="mdl-textfield__label" for="user">Account age (Days)</label>
                    </div> -->
=======
                    <label class="mdl-textfield__label" for="user">Account Age <small style="opacity: .5">(Days)</small></label>
                    </div>
>>>>>>> refs/remotes/origin/master
                    <button style="float:right" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Go</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div id="entry-thankyou" class="col-md-6" style="display:none;">
              <center><p>Thank you for visiting Bolt. If you have a bugs/suggestion feel free to <a href="/contact">contact</a> me on Reddit.<p></center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div id="entry-thankyou" class="col-md-6" style="display:none;">
              <center><p>Please note: If you encounter "Whoops, looks like something went wrong." it is likely that your options were not valid, too high or too low.<p></center>
            </div>
        </div>
        </div>
    @include('layouts.foot')
  </body>
</html>
