<div class="mb-4 mt-2">
  <form action="{{ route($r) }}">
    <div class="row">
      <div class="mt-2 col-md-4">
        <input class="form-control form-control-sm" type="search" name="q" value="{{ $filter['q'] }}" placeholder="Search">
      </div>

      <div class="mt-2 col-md-2 col-6">
        <select name="sort" class="form-control form-control-sm" value="{{ $filter['sort'] }}">
          @foreach($a as $col)
            <option @if($col == $filter['sort']) selected @endif value="{{ $col }}">{{ ucfirst($col) }}</option>
          @endforeach
        </select>
      </div>

      <div class="mt-2 col-md-2 col-6">
        <select name="order" class="form-control form-control-sm" value="{{ $filter['order'] }}">
          @foreach([['id' => 'asc', 'name' => 'Ascending'], ['id' => 'desc', 'name' => 'Descending']] as $order)
            <option @if($order['id'] == $filter['order']) selected @endif value="{{ $order['id'] }}">{{ $order['name'] }}</option>
          @endforeach
        </select>
      </div>

      <div class="mt-2 col-md-2 col-6">
        <select name="count" class="form-control form-control-sm" value="{{ $filter['count'] }}">
          @foreach(['20','50','100','250', '500'] as $page)
            <option @if($page == $filter['count']) selected @endif value="{{ $page }}">{{ $page }}</option>
          @endforeach
        </select>
      </div>

      <div class="mt-2 col-md-2 col-6">
        <button type="submit" class="w-100 btn btn-sm bg-dark text-white">Filter</button>
      </div>
    </div>
  </form>
</div>
