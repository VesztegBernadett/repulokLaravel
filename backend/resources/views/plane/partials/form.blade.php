<form action="{{ route('home') }}" method="get" class="row my-1">
    <div class="col-12 col-md-6 col-lg-4 mb-1">
        <label for="manufacturer" class="form-label">Gyártó</label>
        <input type="text" name="manufacturer" id="manufacturer" value="{{ !empty($query['manufacturer']) ? $query['manufacturer'] : '' }}" class="form-control">
    </div>
    <div class="col-12 col-md-6 col-lg-4 mb-1">
        <label for="type" class="form-label">Típus</label>
        <select name="type" id="type" class="form-select">
            <option value="">Válasszon...</option>
            <option value="narrow_body" @selected(!empty($query['type']) && $query['type'] == 'narrow_body')>Keskenytörzsű</option>
            <option value="wide_body" @selected(!empty($query['type']) && $query['type'] == 'wide_body')>Szélestörzsű</option>
        </select>
    </div>
    <div class="col-12 col-md-6 col-lg-4 mb-1">
        <div class="row">
            <div class="col-6">
                <label for="minSeats" class="form-label">Min. ülések</label>
                <input type="number" name="minSeats" id="minSeats" class="form-control" min="0" value="{{ !empty($query['minSeats']) ? $query['minSeats'] : '' }}">
            </div>
            <div class="col-6">
                <label for="maxSeats" class="form-label">Max. ülések</label>
                <input type="number" name="maxSeats" id="Seats" class="form-control" min="0" value="{{ !empty($query['maxSeats']) ? $query['maxSeats'] : '' }}">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 mb-1">
        <label for="orderBy" class="form-label">Rendezés</label>
        <select name="orderBy" id="orderBy" class="form-select">
            <option value="">Válasszon...</option>
            <option value="seats" @selected(!empty($query['orderBy']) && $query['orderBy'] == 'seats')>Ülések száma</option>
            <option value="first_flight" @selected(!empty($query['orderBy']) && $query['orderBy'] == 'first_flight')>Első felszállás</option>
        </select>
    </div>
    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center align-items-end gap-2 mb-1">
        <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="order" id="orderAsc" value="asc" @checked(empty($query['order']) || $query['order'] != 'desc')>
            <label class="form-check-label" for="orderAsc">Növekvő</label>
        </div>
        <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="order" id="orderDesc" value="desc" @checked(!empty($query['order']) && $query['order'] == 'desc')>
            <label class="form-check-label" for="orderDesc">Csökkenő</label>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center align-items-end mb-1">
        <button type="submit" class="btn btn-success flex-fill">Szűrés</button>
    </div>
</form>