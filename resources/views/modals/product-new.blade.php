<!-- Modal -->
<div class="modal fade" id="new-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Lägg till en ny produkt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product.add.new') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Namn</label>
                        <input name="name" type="text" class="form-control" placeholder="Päronsplitt" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Pris</label>
                        <input name="price" type="integer" class="form-control" placeholder="100" required>
                    </div>

                    <div class="form-group">
                        <label for="product_nr">Produkt nummer</label>
                        <input name="product_nr" type="text" class="form-control" placeholder="PXXX" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Skicka</button>
                </form>
            </div>
        </div>
    </div>
</div>
