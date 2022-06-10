@extends('layouts.app')
@section('title', $patient->name . 'の登録情報詳細')
@section('content')           
    <div class="row mt-5">
        <h1 id="title" class="col-sm-12 text-center text-success mt-4 mb-3">{{ $patient->name }}の登録情報詳細</h1>
    </div>
    <div class="row mt-2">
        <p class="col-sm-12 text-left text-danger mt-4">※最終更新日: {{ $patient->updated_at }}</p>
    </div>
    <table class="table table-bordered table-striped">
        
        <tr>
            <th class="text-center col-3">登録日時</th>
            <td class="text-primary">{{ $patient->created_at }}</td>
        </tr>
        <tr>
            <th class="text-center">登録した職員</th>
            <td>{!! link_to_route('users.show', $patient->user->name, ['id' => $patient->user->id], ['class' => 'text-info']) !!}</td>
        </tr>
        <tr>
            <th class="text-center">ID</th>
            <td>{{ $patient->id }}</td>
        </tr>
        <tr>
            <th class="text-center">名前</th>
            <td>{{ $patient->name }}</td>
        </tr>
        <tr>
            <th class="text-center">生年月日</th>
            <td>{{ $patient->birthday }}</td>
        </tr>
        <tr>
            <th class="text-center">性別</th>
            <td>{{ $patient->gender }}</td>
        </tr>
        <tr>
            <th class="text-center">郵便番号</th>
            <td>{{ $patient->postal_code }}</td>
        </tr>
        <tr>
            <th class="text-center">住所</th>
            <td>{{ $patient->address }}</td>
        </tr>
        <tr>
            <th class="text-center">電話番号⓵(自宅)</th>
            <td>{{ $patient->phone_number_1 }}</td>
        </tr>
        <tr>
            <th class="text-center">電話番号⓶(携帯)</th>
            <td>{{ $patient->phone_number_2 }}</td>
        </tr>
        <tr>
            <th class="text-center">メールアドレス</th>
            <td>{{ $patient->email }}</td>
        </tr>
        <tr>
            <th class="text-center">緊急連絡先⓵</th>
            <td>{{ $patient->emergency_contact_1 }}</td>
        </tr>
        <tr>
            <th class="text-center">続柄⓵</th>
            <td>{{ $patient->relationship_1 }}</td>
        </tr>
        <tr>
            <th class="text-center">緊急連絡先の郵便番号⓵</th>
            <td>{{ $patient->emergency_contact_postal_code_1 }}</td>
        </tr>
        <tr>
            <th class="text-center">緊急連絡先の住所⓵</th>
            <td>{{ $patient->emergency_contact_address_1 }}</td>
        </tr>
        <tr>
            <th class="text-center">緊急連絡先⓶</th>
            <td>{{ $patient->emergency_contact_2 }}</td>
        </tr>
        <tr>
            <th class="text-center">続柄⓶</th>
            <td>{{ $patient->relationship_2 }}</td>
        </tr>
        <tr>
            <th class="text-center">緊急連絡先の郵便番号⓶</th>
            <td>{{ $patient->emergency_contact_postal_code_2 }}</td>
        </tr>
        <tr>
            <th class="text-center">緊急連絡先の住所⓶</th>
            <td>{{ $patient->emergency_contact_address_2 }}</td>
        </tr>
        <tr>
            <th class="text-center">医療機関</th>
            <td>{{ $patient->family_hospital }}</td>
        </tr>
        <tr>
            <th class="text-center">医療機関の連絡先</th>
            <td>{{ $patient->family_hospital }}</td>
        </tr>
        <tr>
            <th class="text-center">医療機関の郵便番号</th>
            <td>{{ $patient->family_hospital_postal_code }}</td>
        </tr>
        <tr>
            <th class="text-center">医療機関の住所</th>
            <td>{{ $patient->family_hospital_address }}</td>
        </tr>
        <tr>
            <th class="text-center">主治医</th>
            <td>{{ $patient->doctor }}</td>
        </tr>
        <tr>
            <th class="text-center">病名</th>
            <td>{{ $patient->disease_name }}</td>
        </tr>
        <tr>
            <th class="text-center">通院頻度</th>
            <td>{{ $patient->visits }}</td>
        </tr>
        <tr>
            <th class="text-center">処方箋</th>
            <td>{{ $patient->prescription }}</td>
        </tr>
        <tr>
            <th class="text-center">病歴</th>
            <td>{{ $patient->clinical_history }}</td>
        </tr>
        <tr>
            <th class="text-center">既往歴</th>
            <td>{{ $patient->medical_history }}</td>
        </tr>
        <tr>
            <th class="text-center">生活歴</th>
            <td>{{ $patient->life_history }}</td>
        </tr>
        <tr>
            <th class="text-center">家族構成</th>
            <td>{{ $patient->family_structure }}</td>
        </tr>
        <tr>
            <th class="text-center">学歴</th>
            <td>{{ $patient->academic_background }}</td>
        </tr>
        <tr>
            <th class="text-center">職歴</th>
            <td>{{ $patient->work_experience }}</td>
        </tr>
        <tr>
            <th class="text-center">経済状況</th>
            <td>{{ $patient->economic_condition }}</td>
        </tr>
        <tr>
            <th class="text-center">関係機関</th>
            <td>{{ $patient->related_organization }}</td>
        </tr>
        <tr>
            <th class="text-center">福祉サービス等</th>
            <td>{{ $patient->welfare_service }}</td>
        </tr>
        <tr>
            <th class="text-center">画像資料</th>
            <td class="text-center">
                @if($patient->image)
                <img src="{{ Storage::disk('s3')->url('uploads/' . $patient->image) }}" alt="{{ $patient->image }}" id="patients_img">
                @else
                <img src="{{ asset('images/no_image.jpg') }}" alt="画像資料はありません" id="patients_img">
                @endif
            </td>
        </tr>
        <tr>
            <th class="text-center">支援にあたって配慮すべき点</th>
            <td>{{ $patient->consideration }}</td>
        </tr>
        <tr>
            <th class="text-center">その他</th>
            <td>{{ $patient->other }}</td>
        </tr>
        <tr>
            <th class="text-center">ブックマーク追加/解除</th>
            <td>
                <!-- まだブックマークしていない場合 -->
                @if(!Auth::user()->is_patient_bookmark($patient->id))
                {!! Form::open(['route' => ['patients.bookmark', 'id' => $patient->id]]) !!}
                    {!! Form::submit('ブックマーク追加', ['class' => 'btn btn-success btn-block']) !!}
                {!! Form::close() !!}
                
                <!-- ブックマークをしている場合 -->
                @else
                {!! Form::open(['route' => ['patients.unbookmark', 'id' => $patient->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('ブックマーク解除', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
                @endif
            </td>
        </tr>
        <tr>
            <th class="text-center">ブックマークの数</th>
            <td>{{ count($patient->patient_bookmark_users) }} 個</td>
        </tr>
        <tr>
            <th class="text-center">ブックマークした人の一覧</th>
            <td>
                <ul>
                    @foreach($patient_bookmark_users as $user)
                    <li>{!! link_to_route('users.show', $user->name , ['id' => $user->id ],['class' => 'text-info']) !!}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        
        
    </table>
    
    <div class="row mt-5">
        {!! link_to_route('patients.edit', '編集', ['id' => $patient->id ], ['class' => 'offset-sm-3 col-sm-6 btn btn-success']) !!}
    </div>
    
    {!! Form::model($patient, ['route' => ['patients.destroy', 'id' => $patient->id ], 'method' => 'DELETE']) !!}
    <div class="row mt-4">
        <!-- 削除確認アラートをつける。 -->
        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-block offset-sm-3 col-sm-6', 'id' => 'delete_patient']) !!}
    </div>
    {!! Form::close() !!}
        
    <div class="row mt-4">
        {!! link_to_route('records.index', $patient->name. 'の相談記録一覧へ戻る', ['id' => $patient->id], ['class' => 'offset-sm-3 col-sm-6 btn btn-info']) !!}
    </div>
@endsection