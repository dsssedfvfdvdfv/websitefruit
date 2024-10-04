<div class="container px-4 mx-auto">
  <div class="selectdiv">
    <label>
      <label for="">Năm</label>
    <select name="selectedYear" id="selectedYear" >  
      <option value=""selectd>Năm</option>
          @foreach($loadyear as $year)
          <option value="{{ $year->year }}">{{ $year->year }}</option>
          @endforeach
        </select>       
    </label>
  </div>
  <div class="p-6 m-20 bg-white rounded shadow">
    {!! $chart->container() !!}
  </div>

</div>
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}

