@extends('layouts.app')
@section('title',  'ブックマークした相談記録一覧')
@section('content')
    <div class="text-center text-success mt-5 pt-4">
        <h1>職員: {{ $user->name }}がブックマークした相談記録一覧</h1>
        
        @if($records->total() !== 0)
        <div class="row mt-5">
            <p class="col-sm-12 text-left text-danger mt-2">※相談記録: {{ $records->total() }}件</p>
        </div>
        <div class="row">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>記録番号</th>
                    <th>記録内容</th>
                    <th>画像資料</th>
                    <th>記録した職員</th>
                    <th>記録日時</th>
                </tr>
                @foreach($records as $key => $record)
                <tr>
                    <td>{!! link_to_route('records.show', ($key + 1), [$record->patient_id, $record->id], ['class' => 'btn btn-success']) !!}</td>
                    <td>{{ $record->content }}</td>
                    <td>
                        @if($record->image)
                        <img src="{{ Storage::disk('s3')->url('uploads/' . $record->image) }}" alt="{{ $record->image }}" id="case_photo">
                        @else
                        <img src="{{ asset('images/no_image.jpg') }}" alt="画像資料はありません" id="case_photo">
                        @endif
                    </td>
                    <td>{!! link_to_route('users.show', $record->user->name, ['id' => $user->id], ['class' => 'text-info']) !!}</td>
                    <td class="text-primary">{{ $record->created_at }}</td>
                </tr>
                @endforeach
            </table>
            {{ $records->links('pagination::bootstrap-4') }}
        </div>
        @else
        <div class="row mt-3">
            <p class="col-sm-12 text-center text-danger">※ブックマークした相談記録はありません</p>
        </div>
        @endif
    </div>
@endsection