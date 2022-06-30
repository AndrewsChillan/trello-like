@extends('layouts.app')

@section('content')

<div class="row row-cols-1 row-cols-md-3 g-4">
    {{-- Section à faire --}}
    <div class="col">
        <div class="card h-100">
            <img src="image/afaire.jpg" class="img-thumbnail" alt="A faire">            
            <div class="card-body">
                <h5 class="card-title">A FAIRE</h5>
                <ul class="list-group list-group-flush">
                  @foreach ($cards as $card)
                    <li class="list-group-item">{{ $card->id }} {{ $card->content }}</li>
                  @endforeach
                </ul>
            </div>
            <div class="card-footer">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <a class="btn btn-warning" href="">Modifier la carte</a>
                    <!-- Button fenetre modale -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Modifier</button>
                                </div>
                                <div class="modal-body">
                                  ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Modal title</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                </div>
            </div>
        </div>
    </div>
    {{-- Section En cours --}}
    <div class="col">
        <div class="card h-100">
                <img src="image/en cours.jpg" class="img-thumbnail" alt="En cours">            
            <div class="card-body">
                <h5 class="card-title">A FAIRE</h5>
                <ul class="list-group list-group-flush">
                  @foreach ($cards as $card)
                    <li class="list-group-item">{{ $card->id }} {{ $card->content }}</li>
                  @endforeach
                </ul>
            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </div>
    {{-- Section Terminé --}}
    <div class="col">
        <div class="card h-100">
            <img src="image/terminé.jpg" class="img-thumbnail" alt="Terminé">
            <div class="card-body">
                <h5 class="card-title">A FAIRE</h5>
                <ul class="list-group list-group-flush">
                  @foreach ($cards as $card)
                    <li class="list-group-item">{{ $card->id }} {{ $card->content }}</li>
                  @endforeach
                </ul>
            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </div>
  </div>

@endsection 