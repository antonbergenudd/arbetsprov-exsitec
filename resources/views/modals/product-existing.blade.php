<!-- Modal -->
<div class="modal fade" id="stock-modal-{{$stock->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$stock->city}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product.add.existing') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <select name="product_id" class="form-control">
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="balance">Balans</label>
                        <input name="balance" type="text" class="form-control" placeholder="10000" required>
                    </div>

                    <div class="form-group">
                        <label for="author">Anställningsnummer</label>
                        <input name="author" type="text" class="form-control" placeholder="Anställningsnummer" required>
                    </div>

                    <input type="hidden" name="stock_id" value="{{$stock->id}}">

                    <button type="submit" class="btn btn-primary">Skicka</button>

                </form>
            </div>
        </div>
    </div>
</div>
