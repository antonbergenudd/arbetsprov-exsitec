<!-- Modal -->
<div class="modal fade" id="remove-product-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ta bort {{$product->name}} från {{$stock->city}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product.remove', ['stock' => $stock->id, 'product' => $product->id])}}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="author">Anställningsnummer</label>
                        <input name="author" type="text" class="form-control" placeholder="Anställningsnummer" required>
                    </div>

                    <button type="submit" style="background-color:none; border:none; color:red;">Ta bort</button>
                </form>
            </div>
        </div>
    </div>
</div>
