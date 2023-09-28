@extends('layout')
@section('content')
<div class="syoukaijou_create">
  <div class="syoukaijou-top">
    <div class="syoukaijou-daimei">紹介状作成</div>
    <div class="return">戻る</div>
  </div>
  <div class="syoukaijou-create">
    <div class="syoukaijou-title">
      <form action="{{ route('preview.edit') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="syoukaijou-title-daimei">
          <div class="yusei">タイトル入力(必須)</div>
        </div>
        @if($errors->any())
          <div class="error-message">
            <ul>
              @error('title')
              <li>{{ $message }}</li>
              @enderror
            </ul>
          </div>
          @endif
        <div><textarea name="title" id="" cols="80" rows="2">{{ old('title') }}</textarea></div>
    </div>
    <div class="syoukaijou-main">
      <div class="syoukaijou-honbun">本文（必須）</div>
      @if($errors->any())
          <div class="error-message">
            <ul>
              @error('main')
              <li>{{ $message }}</li>
              @enderror
            </ul>
          </div>
          @endif
      <div class="form"><textarea name="main" id="" cols="80" rows="20">{{ old('main') }}</textarea></div>
    </div>
    <div class="syoukaijou-pic">
    </div>
    <div class="syoukaijou-jyanru-area">
      <div class="syoukaijou-jyanru">
        <div class="syoukaijou-jyanru-title">ジャンル</div>
        @if($errors->any())
          <div class="error-message">
            <ul>
              @error('janru')
              <li>{{ $message }}</li>
              @enderror
            </ul>
          </div>
          @endif
        <div class="janru-select"><select name="jyanru" id=""></select></div>
      </div>
      <div class="syoukaijou-area">
        <div class="syoukaijou-area-title">エリア</div><br><br>
        @if($errors->any())
          <div class="error-message">
            <ul>
              @error('area')
              <li>{{ $message }}</li>
              @enderror
            </ul>
          </div>
          @endif
        <div class="area-select"><select name="area" id=""></select></div>
      </div>
    </div>
    <div class="syoukaijou-supot">
      <div class="syoukaijou-supot-title">スポット情報</div>
      <div class="syoukaijou-supot-name">スポット名、店名（必須）</div>
      @if($errors->any())
          <div class="error-message">
            <ul>
              @error('spot-name')
              <li>{{ $message }}</li>
              @enderror
            </ul>
          </div>
          @endif
      <div class="form"><textarea name="spotname" id="" cols="80" rows="1">{{ old('spotname') }}</textarea></div>
      <div class="syoukaijou-supot-zyusyo">住所（任意）</div>
      <div class="form"><textarea name="addles" id="" cols="80" rows="1">{{ old('addles') }}</textarea></div>
      <div class="syoukaijou-supot-url">URL（任意）</div>
      <div class="form"><textarea name="url" id="" cols="80" rows="1">{{ old('url') }}</textarea></div>
    </div>
    <div class="syoukaijou-bottom">
      <div class="return">戻る</div>
      <div class="syoukaijou-pic-button"><input class="btn-daidai" type="submit" value="投稿する"></div>
      </form>
    </div>
  </div>
</div>
@endsection