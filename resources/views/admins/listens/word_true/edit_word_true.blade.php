@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-6 ">
            <h3>Sửa đáp án </h3>
            <br>

            <form action="{{route('word_true.update', $words->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="cars">Chọn Listens </label>
                    <select name="listen_audio_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        @foreach ($listens as $listen)
                        <option value="{{ $listen->id }}">{{$listen->listen_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="cars">Word_true </label>
                    <select name="status_true" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">

                        <option value="true">True</option>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Đáp án</label>
                    <input type="text" class="form-control" id="" name="word_true" require="" value="{{ $words->word_true }}">
                    <div id="" class="form-text"></div>

                    @error('word_true')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cars">Status_false</label>
                    <select name="status_false" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">

                        <option value="false">false</option>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Word_false</label>
                    <input type="text" class="form-control" id="" name="word_false" require="" value="{{ $words->word_false }}">
                    <div id="" class="form-text"></div>

                    @error('word_false')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <br>

                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
        </div>
        <div class="col col-sm-6">

        </div>
    </div>
</div>


@endsection
