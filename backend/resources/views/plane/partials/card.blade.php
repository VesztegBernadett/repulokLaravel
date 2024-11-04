<div class="col-12 col-md-6 col-lg-3 mb-2 d-flex align-items-stretch">
    <div class="card">
        <img src="{{ asset('/images/' . strtolower($plane['family']) . '.jpg')}}" class="card-img" alt="">
        <div class="card-body d-flex flex-column justify-content-evenly">
            <h5 class="card-title"></h5>
            <ul>
                @if ($plane["type"] === "narrow_body")
                    <li>Keskenytörzsű</li>
                @else
                    <li>Szélestörzsű</li>
                @endif
                <li>Első felszállás: {{$plane["first_flight"]}}</li>
                <li>Hajtóművek száma: {{$plane["engines"]}}</li>
                <li>Maximum ülések száma: {{$plane["seats"]}}</li>
            </ul>
            <a href="" class="btn btn-primary">További információk</a>
        </div>
    </div>
</div>