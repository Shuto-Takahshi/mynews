@extends('layouts.profile')
@section('title', 'プロフィールの編集')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>プロフィール編集</h2>
        <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">

          @if (count($errors) > 0)
            <ul>
              @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          @endif
          <div class="form-group row">
            <label class="col-md-2">氏名</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="name" value="{{ old('name', $profile_form->name) }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">性別</label>
            <div class="col-md-10">
              <label>
                <input type="radio" name="gender" value="男" @if($profile_form->gender == "男") checked="checked" @endif>
                男
              </label>
              <label>
                <input type="radio" name="gender" value="女" @if($profile_form->gender == "女") checked="checked" @endif>
                女
              </label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">趣味</label>
            <div class="col-md-10">
              <textarea class="form-control" name="hobby" rows="5">{{ old('hobby', $profile_form->hobby) }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">自己紹介欄</label>
            <div class="col-md-10">
              <textarea class="form-control" name="introduction" rows="10">{{ old('introduction', $profile_form->introduction) }}</textarea>
            </div>
          </div>
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $profile_form->id }}">
          <input type="submit" class="btn btn-primary" value="更新">
        </form>
        <div class="row mt-5">
          <div class="col-md-4 mx-auto">
            <h2>編集履歴</h2>
            <ul class="list-group">
              @if ($profile_form->histories != NULL)
                @foreach ($profile_form->histories as $history)
                  <li class="list-group-item">{{ $history->edited_at }}</li>
                @endforeach
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection