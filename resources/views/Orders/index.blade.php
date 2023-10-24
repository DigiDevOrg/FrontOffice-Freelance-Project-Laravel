@extends("layouts/contentNavbarLayout")
@section("title", "The Orders")
@section("content")
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session()->has('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session()->get('success') }}",
            icon: 'success',
            timer: 4000,
            confirmButtonText: 'OK'
        })
    </script>
@endif

<h1>The Orders</h1>



<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr de vouloir supprimer cette commande ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Oui, supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Parcourir la collection de commandes -->
<div class="d-flex flex-wrap">
    @foreach ($orders as $order)
        <div class="card m-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Commande :{{ $order->order_id }}</h5>
                <p>Service ID: {{ $order->service_id }}</p>
                <p>Buyer ID: {{ $order->buyer_id }}</p>
                <p>Seller ID: {{ $order->seller_id }}</p>
                <p>Date de commande: {{ $order->order_date }}</p>
                <p>Statut de la commande: {{ $order->order_status }}</p>

                @auth
    @if (auth()->user()->id === $order->buyer_id)
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('orders.destroy', $order) }}">
            Supprimer
        </button>
        <a href="{{ route('messages.store', ['order_id' => $order->id]) }}" class="btn btn-primary">
            Message
        </a>
    @endif
@endauth
            </div>
        </div>
    @endforeach
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var url = button.data('url');
        var modal = $(this);
        modal.find('#deleteForm').attr('action', url);
    });
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
