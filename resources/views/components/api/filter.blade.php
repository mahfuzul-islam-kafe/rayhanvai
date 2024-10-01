<p class="d-inline-flex gap-1">
    <button class="btn btn-secondary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
        Button with data-bs-target
    </button>
    <a class="btn btn-primary" href="{{route('reset')}}">
        Reset
      </a>    
</p>
<div class="collapse mb-3" id="collapseExample">
    <div class="card ">
        <div class="card-header">
            <h4>Filter</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5>Limit product :</h5>
                    <form class="d-flex" action="{{route('api.limit')}}" method="get">
                        @csrf
                        <input class="form-control me-2" type="text" name="limit" placeholder="Enter Limit Number" >
                        <button class="btn btn-outline-info" type="submit">Limit</button>
                    </form>
                </div>
                <div class="col-md-3">
                    <h5>Sort :</h5>
                   <div class="d-flex gap-2">
                    <a href="{{route('api.desc')}}" class="btn btn-success">desc</a>
                    <a href="{{route('api.asc')}}" class="btn btn-success">asc</a>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
