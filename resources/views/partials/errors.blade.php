@if ($errors->count() > 0)
  <div class="grid-container">
    <div class="grid-x">
      <div class="cell" data-sticky-container>
        <div class="sticky" data-sticky data-stick-to="bottom">
          <div class="alert callout" data-closable>
            <h5>Ups!</h5>
            @foreach ($errors->all() as $error)
              <ul>
                <li>{{$error}}</li>
              </ul>
            @endforeach
            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

@endif
