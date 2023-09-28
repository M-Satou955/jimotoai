@extends('layout')
@section('content')

<div class="area-choice midasi">エリア選択画面</div>

<div class="area-teach">あなたの素敵な地元を教えてください!!</div>
<form action="">
  <div class="area-select-choice">
    <div class="toubu">
      <div class="midasi area-select-top">東武</div>
      <div class="city-select">
        @foreach($toubu as $tou)
        <li>
          <input type="radio" name="area-choice" value="area">
          {{$tou['municipalities_name']}}
        </li>
        @endforeach
      </div>
    </div>


    <div class="seibu">
      <div class="midasi area-select-top">西部</div>
      <div class="city-select">
        @foreach($seibu as $sei)
        <li>
          <input type="radio" name="area-choice">
          {{$sei['municipalities_name']}}
        </li>
        @endforeach
      </div>
    </div>


    <div class="kenou">
      <div class="midasi area-select-top">県央</div>
      <div class="city-select">
        @foreach($kenou as $ken)
        <li>
          <input type="radio" name="area-choice">
          {{$ken['municipalities_name']}}
        </li>
        @endforeach
      </div>
    </div>


    <div class="agatumas">
      <div class="midasi area-select-top">吾妻</div>
      <div class="city-select">
        @foreach($agatuma as $aga)
        <li>
          <input type="radio" name="area-choice">
          {{$aga['municipalities_name']}}
        </li>
        @endforeach
      </div>
    </div>

    <div class="tone">
      <div class="midasi area-select-top">利根・沼田</div>
      <div class="city-select">
        @foreach($tone_numata as $numatacity)
        <li>
          <input type="radio" name="area-choice">
          {{$numatacity['municipalities_name']}}
        </li>
        @endforeach
      </div>
    </div>
  </div>
  <div><input type="submit" class="btn-green" value="OK"></div>
</form>

<!-- <div class="area-photo"><img src="/image/gunma.png" class="area-img"></div> -->
@endsection