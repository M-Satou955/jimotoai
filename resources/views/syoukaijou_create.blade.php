@extends('layout')
@section('content')
<div class="syoukaijou_create">
  <div class="syoukaijou-top">
    <div class="syoukaijou-daimei yu-sei underline-black">紹介状作成</div>
    <div class="return">戻る</div>
  </div>
  <div class="syoukaijou-create">
    <form action="{{ route('preview.edit') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="syoukaijou-title">

        <div class="syoukaijou-title-daimei">
          <div class="yusei">タイトル入力<font color="red">(必須)<font color="def">
          </div>
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
        <div class="create-form"><input class="form" type="text" name="title" id="" value="{{ old('title') }}"></div>
      </div>
      <div class="syoukaijou-main">
        <div class="syoukaijou-honbun">本文<font color="red">(必須)<font color="def">
        </div>
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
      <div class="syoukaijou-view">スポットビュー<font color="red">(１枚必須)</font>
        <font color="def"></font>
      </div>
      @if($errors->any())
      <div class="error-message">
        <ul>
          @error('image1')
          <li>{{ $message }}</li>
          @enderror
        </ul>
      </div>
      @endif
      <div class="syoukaijou-pic">
        <div>
          <label>
            <div class="pic-label">
              <input type="file" name="image1" accept="image/*">ファイルを選択<font color="red">(必須)</font><br>
            </div>
            <p class="image1">ファイルが選択されていません。</p>
          </label>
        </div>
        <div>
          <label>
            <div class="pic-label">
              <input type="file" name="image2" accept="image/*">ファイルを選択<br>
            </div>
            <p class="image2">ファイルが選択されていません。</p>
          </label>
        </div>
        <div>
          <label>
            <div class="pic-label">
              <input type="file" name="image3" accept="image/*">ファイルを選択<br>
            </div>
            <p class="image3">ファイルが選択されていません。</p>
          </label>
        </div>
        <div>
          <label>
            <div class="pic-label">
              <input type="file" name="image4" accept="image/*">ファイルを選択
            </div>
            <p class="image4">ファイルが選択されていません。</p>
          </label>
        </div>
      </div>
      <div class="syoukaijou-jyanru-area">
        <div class="syoukaijou-jyanru">
          <div class="syoukaijou-jyanru-title">ジャンル
            @if($errors->any())
            <div class="error-message">
              <ul>
                @error('janru')
                <li>{{ $message }}</li>
                @enderror
              </ul>
            </div>
            @endif
            <div class="form-group">
              <select class="form-control" id="id" name="category">
                @foreach ($category as $item)
                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="syoukaijou-area">

          <div class="syoukaijou-area-title">エリア
            @if($errors->any())
            <div class="error-message">
              <ul>
                @error('area')
                <li>{{ $message }}</li>
                @enderror
              </ul>
            </div>
            @endif
            <div class="area-select">
              <div class="form-group">
                <select class="form-control" id="id" name="municipalitie">
                  @if(count($userdetail)>0)
                  @if($item->id = $userdetail[0]->municipalitie_id)
                  <option value="{{ $userdetail[0]->municipalitie_id }}" selected>{{$userdetail[0]->municipalities_name}}</option>
                  @endif
                  @endif
                  @foreach ($municipalitie as $item)
                  <option value="{{ $item->id }}">{{ $item->municipalities_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="syoukaijou-supot">
        <div class="syoukaijou-supot-title">スポット情報</div>
        <div class="syoukaijou-supot-name">スポット名、店名(必須)</div>
        @if($errors->any())
        <div class="error-message">
          <ul>
            @error('spotname')
            <li>{{ $message }}</li>
            @enderror
          </ul>
        </div>
        @endif
        <div class="create-form"><input class="form" type="text" name="spotname" id="" value="{{ old('spotname') }}"></textarea></div>
        <div class="syoukaijou-supot-zyusyo">住所(任意)</div>
        @if($errors->any())
        <div class="error-message">
          <ul>
            @error('address')
            <li>{{ $message }}</li>
            @enderror
          </ul>
        </div>
        @endif
        <div class="create-form"><input class="form" type="text" name="address" id="" value="{{ old('address') }}"></textarea></div>
        <div class="syoukaijou-supot-url">URL(任意)</div>
        @if($errors->any())
        <div class="error-message">
          <ul>
            @error('url')
            <li>{{ $message }}</li>
            @enderror
          </ul>
        </div>
        @endif
        <div class="create-form"><input class="form" type="text" name="url" id="" value="{{ old('url') }}"></div>
      </div>

      <div class="syoukaijou-bottom">
        <div class="return">戻る</div>
        <div class="syoukaijou-pic-button"><input class="btn-daidai" type="submit" value="投稿する"></div>
      </div>
    </form>
  </div>
</div>
@endsection