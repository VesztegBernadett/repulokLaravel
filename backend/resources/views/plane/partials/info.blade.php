<div class="col-12 mt-2">
    <h2>{{ isset($title) ? $title : 'Nincs title!' }}</h2>
    <div class="card text-bg-dark">
        <img src="{{ asset('/images/' . strtolower($plane['family']) . '.jpg')}}" class="card-img" alt="{{$plane['manufacturer']}} {{$plane['family']}}">
        <div class="card-img-overlay">
            <h5 class="card-title fs-1"><span class="badge text-bg-primary">{{ $plane['manufacturer'] }} {{ $plane['family'] }}</span></h5>
            <p class="card-text fs-5 mb-2"><span class="badge text-bg-success">{{ $plane['seats'] }} ülőhely</span></p>
            <p class="card-text fs-6"><span class="badge text-bg-secondary">{{ $plane['type'] == 'narrow_body' ? 'Keskenytörzsű' : 'Szélestörzsű' }}</span></p>
        </div>
    </div>
</div>