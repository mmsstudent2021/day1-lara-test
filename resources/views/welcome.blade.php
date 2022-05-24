@extends("master")
@section("title") Home Page @endsection


@section('content')
    <div class="p-3">
        <h1>Home Page</h1>

        <form method="post" action="{{ route('exchange-to-mmk') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="file" class="form-control" name="photo">
            </div>
            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="text" class="form-control" name="amount" required>
            </div>
            <div class="mb-3">
                <select @class("form-select") name="currency">
                    <option value="USD">USD</option>
                    <option value="SGD">SGD</option>
                    <option value="EUR">EUR</option>
                </select>
            </div>
            <button class="btn btn-primary">Change</button>
        </form>
    </div>
@endsection

