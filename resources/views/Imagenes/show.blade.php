<div class="table-responsive">

<div class="row">
    @foreach ($imagenes as $imag)
<div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-body">
          <a href="#" class="thumbnailj">
            <img src="{{ asset('storage/'.$imag->urlimagen) }}" WIDTH="250px" height="200px"></img>
        </a>
      </div>
    </div>
</div>
    @endforeach
</div>
</div>
