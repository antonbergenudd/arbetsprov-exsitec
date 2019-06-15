<!-- Modal -->
<div class="modal fade" id="addLog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Bokför in och ut leveranser</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('log.add') }}" method="POST" id="log_form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Välj lager</label>
                        <select name="stock_id" class="form-control" id="log_stocks">
                            @foreach($stocks as $stock)
                                <option value="{{$stock->id}}" data-stock-products="{{$stock->products}}">{{$stock->city}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Välj vara</label>
                        <select name="product_id" class="form-control" id="log_products">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="balance">Antal produkter</label>
                        <input name="balance" type="text" class="form-control" placeholder="5000" required>
                    </div>
                    <div class="form-group">
                        <label for="author">Anställningsnummer</label>
                        <input name="author" type="text" class="form-control" placeholder="Anställningsnummer" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
