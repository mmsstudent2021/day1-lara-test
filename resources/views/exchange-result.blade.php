@extends("master")
@section("content")
    <div class="p-5">
        <h1>Your Result is {{ $inputAmount }} {{ $inputCurrency }} = {{ $result }}</h1>
        <a href="{{ route('exchange-calculator') }}" class="btn btn-primary">Try Next</a>

        <h3 class="mt-5">Exchange History</h3>
        <ul class="list-group">
            @foreach($records as $record)
            <li class="list-group-item">{{ $record->input }} = {{ $record->output }}</li>
            @endforeach
        </ul>
    </div>
@endsection
