@extends("master")
@section("content")
    <form method="post" class="p-5" action="{{ route('exchange') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="text" class="form-control" name="amount" required>
        </div>
        <div class="mb-3">
            <label class="form-label">From Currency</label>
            <select @class("form-select") name="fromCurrency">
                <option value="USD">USD</option>
                <option value="SGD">SGD</option>
                <option value="EUR">EUR</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">To Currency</label>
            <select @class("form-select") name="toCurrency">
                <option value="USD">USD</option>
                <option value="SGD">SGD</option>
                <option value="EUR">EUR</option>
            </select>
        </div>
        <button class="btn btn-primary">Change</button>
    </form>
@endsection
