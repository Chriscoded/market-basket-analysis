 @extends('layouts.app')
 @section('title', 'Payouts')
 @section('judul','Data Payouts')
 @section('content')
 <div>
        <button class="btn btn-primary" id="test" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Checkout</button>
</div>
      <div class="table-responsive">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No Transaction</th>
                    <th>Tanggal Transaction</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($payouts as $products)
            	<tr>
                    <th>{{ Auth::user()->name }}</th>
            		<th>{{ $products->no_transaction }}</th>
                    <th>{{ $products->created_at }}</th>
            		<th>
            			<a href="" class="btn btn-info">View</a>
            		</th>
            	</tr>
                @endforeach
            </tbody>
            
        </table>
      </div>
    </div>
</div>
 <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable"role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title">Checkout Barang
                                </h5>
                            </div>
                        <div class="modal-body">
                            <div class="row">
                                    <form action="{{ route('payouts.store') }}" method="POST" enctype=“multipart/form-data>
                                        @csrf
                                        <table class="table">
                                                {{-- <div>
                                                    <button type="button" class="btn btn-success addData mb-2">Add</button>
                                                    <small>*Tambah Data Barang</small>
                                                </div> --}}
                                                <div>
                                                    <label for="roundText">No Transaction</label>
                                                    <input type="hidden" name="payout_id" id="payout_id">
                                                    <input type="hidden" name="users_id" id="users_id" value="{{ Auth::user()->id}}">
                                                    <input type="text" name="no_transaction" class="form-control round mt-1" placeholder="No Transaction Contoh : 001" required>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-10">
                                                            <select name="product_name1" class="form-control product_name" data-width="100%">
                                                                <option></option>
                                                                @foreach ($data as $item )
                                                                    <option value="{{ $item->product_name }}">{{$item->product_name }}</option>
                                                                @endforeach
                                                            </select> 
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="number" class="form-control" placeholder="qty" name="qty1">
                                                    </div>
                                                    <div class="col-10">
                                                        <select name="product_name2" class="form-control product_name" data-width="100%">
                                                            <option></option>
                                                            @foreach ($data as $item )
                                                                <option value="{{ $item->product_name }}">{{$item->product_name }}</option>
                                                            @endforeach
                                                        </select> 
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="number" class="form-control" placeholder="qty" name="qty2">
                                                    </div>
                                                <div class="col-10">
                                                    <select name="product_name3" class="form-control product_name" data-width="100%">
                                                        <option></option>
                                                        @foreach ($data as $item )
                                                            <option value="{{ $item->product_name }}">{{$item->product_name }}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>
                                                <div class="col-2">
                                                    <input type="number" class="form-control" placeholder="qty" name="qty3">
                                                </div>
                                                    <div class="col-10">
                                                        <select name="product_name4" class="form-control product_names" data-width="100%">
                                                            <option></option>
                                                            @foreach ($data as $item )
                                                                <option value="{{ $item->product_name }}">{{$item->product_name }}</option>
                                                            @endforeach
                                                        </select> 
                                                </div>
                                                <div class="col-2">
                                                    <input type="number" class="form-control" placeholder="qty" name="qty4">
                                                </div>
                                                {{-- <div id="addForm" class="mt-2"></div>  --}}
                                        </table>
                                        <div class="text-left">
                                            <button type="button" class="btn btn-light-secondary"data-bs-dismiss="modal">Close
                                            </button>
                                            <button type="submit" name="submit" class="btn btn-primary btnUpdate">Submit
                                            </button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>

@endsection