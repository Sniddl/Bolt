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
  <?php //dump($winners) ?>
    <title>Bolt - Results</title>
    @include('layouts.header')
</head>
<body>
  <div id="wrap">
      <div class="navigation">
          @include('layouts.nav')
      </div>
          <div class="container">
          <div class="row">
              <div class="col-md-3">
              </div>
              <div id="result-col-6" class="col-md-6">
              <hr>
              @if(isset($winners))
              <ul class="demo-list-three mdl-list">
                <?php $count = 0 ?>
                @foreach ($winners as $winner)
                <li class="mdl-list__item mdl-list__item--three-line bolt-result" id = "id_{{$count}}"
                    data-action = "https://reddit.com/user/{{ $winner->author }}">
                  <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-avatar">person</i>
                    <span>{{ $winner->author }}

                    </span>
                    <span class="mdl-list__item-text-body">
                      <?php echo substr($winner->body, 0, 150) ?>
                    </span>
                  </span>
                  <span class="mdl-list__item-secondary-content">
                    <i class="material-icons">chevron_right</i></a>
                  </span>
                </li>

                <div class="mdl-tooltip mdl-tooltip--large mdl-tooltip--right result-tooltip" data-mdl-for="id_{{$count}}">
                  <ul class="tooltip-list">
                    <li><strong>Karma</strong>: {{$winner->Account['comment_karma']}}</li>
                    <li><strong>Age</strong>: {{$winner->Account['age']}}</li>
                  </ul>
                </div>
                <hr>
                <?php $count ++ ?>
                @endforeach
              @else
              <p class="error-fatal">FATAL!</p>
              @endif
              </ul>
              </div>
          </div>
          </div>
  </div>
  @include('layouts.foot')
</body>

</html>
