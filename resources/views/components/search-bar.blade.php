<div class="searchBar">
      <div class="row justify-content-center">
          <div class="col-md-8">
            <form action="/search">
              <div class="input-group input-group-lg mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1" style="height: 100%"><i class="bi bi-search"></i></span>
                </div>
                <input type="text" class="typeahead form-control bg-white w-50 shadow-none" id="search" name="q" placeholder="Search our database of ads..." value="{{ request()->input('q') }}" autocomplete="off">
                <div class="input-group-prepend geoIcon">
                  <span class="input-group-text" id="basic-addon1" style="height: 100%"><i class="bi bi-geo-alt-fill"></i></span>
                </div>
                <input type="text" class="form-control bg-white shadow-none" id="scity" name="c" placeholder="City/Region" value="{{ request()->input('c') }}" autocomplete="off">
                <div class="input-group-prepend">
                  <button type="submit" id="basic-addon1" style="height: 100%;color:#fff" class="input-group-text btn-info"> Search</button>
                </div>
              </div>
            </form>
          </div>
      </div>
</div>