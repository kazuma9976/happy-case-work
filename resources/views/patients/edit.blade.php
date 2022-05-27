@extends('layouts.app')
@section('title', '利用者ID: ' . $patient->id . 'の編集')
@section('content')         
    <div class="row mt-3">
        <h1 class="col-sm-12 text-center text-success pb-1 mt-5">利用者ID:  {{ $patient->id }} の編集</h1>
    </div>
    <div class="col-sm-6 offset-sm-3 mt-3">
        {!! Form::open(['route' => ['patients.update', 'id' => $patient->id ], 'files' => true, 'method' => 'PUT']) !!}
            <!-- 1行 -->
            <div class="form-group">
                {!! Form::label('name', '名前 :') !!}
                {!! Form::text('name', $patient->name ? $patient->name : old('name'), ['class' => 'form-control']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('birthday', '生年月日 : ') !!}
                {{ Form::date('birthday',  $patient->birthday ? $patient->birthday : old('birthday'), ['class' => 'form-control']) }}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('gender', '性別 :') !!}
                <div class="form-check form-check-inline offset-2">
                    {{ Form::radio('gender', '男性', $patient->gender === '男性' ? true : false, ['class'=>'form-check-input', 'for' => 'inlineCheckbox1']) }}
                    {!! Form::label('gender', '男性' , ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check form-check-inline offset-2">
                    {{ Form::radio('gender', '女性', $patient->gender === '女性' ? true : false, ['class'=>'form-check-input', 'for' => 'inlineCheckbox2']) }}
                    {!! Form::label('gender', '女性', ['class' => 'form-check-label']) !!}
                </div>
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('postal_code', '郵便番号 : ') !!}
                {!! Form::text('postal_code',  $patient->postal_code ? $patient->postal_code : old('postal_code'), ['class' => 'form-control', 'placeholder' => 'ハイフン不要(例: 1234567)']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('address', '住所 : ') !!}
                {!! Form::text('address',  $patient->address ? $patient->address : old('address'), ['class' => 'form-control']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('phone_number_1', '電話番号⓵(自宅) : ') !!}
                {!! Form::text('phone_number_1',  $patient->phone_number_1 ? $patient->phone_number_1 : old('phone_number_1'), ['class' => 'form-control', 'placeholder' => 'ハイフン不要(例: 09012345678)']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('phone_number_2', '電話番号⓶(携帯): ') !!}
                {!! Form::text('phone_number_2', $patient->phone_number_2 ? $patient->phone_number_2 : old('phone_number_2'), ['class' => 'form-control', 'placeholder' => 'ハイフン不要(例: 09012345678)']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('email', 'メールアドレス : ') !!}
                {!! Form::text('email', $patient->email ? $patient->email : old('email'), ['class' => 'form-control', 'placeholder' => 'sample@gmail.com']) !!}
            </div>
            
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('emergency_contact_1', '緊急連絡先⓵ : ') !!}
                {!! Form::text('emergency_contact_1', $patient->emergency_contact_1 ? $patient->emergency_contact_1 : old('emergency_contact_1'), ['class' => 'form-control', 'placeholder' => 'ハイフン不要(例: 09012345678)']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('relationship_1', '続柄⓵ : ') !!}
                {!! Form::text('relationship_1', $patient->relationship_1 ? $patient->relationship_1 : old('relationship_1'), ['class' => 'form-control']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('emergency_contact_postal_code_1', '緊急連絡先の郵便番号⓵ : ') !!}
                {!! Form::text('emergency_contact_postal_code_1', $patient->emergency_contact_postal_code_1 ? $patient->emergency_contact_postal_code_1 : old('emergency_contact_postal_code_1'), ['class' => 'form-control', 'placeholder' => 'ハイフン不要(例:1234567)']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('emergency_contact_address_1', '緊急連絡先の住所⓵ : ') !!}
                {!! Form::text('emergency_contact_address_1', $patient->emergency_contact_address_1 ? $patient->emergency_contact_address_1 : old('emergency_contact_address_1'), ['class' => 'form-control']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('emergency_contact_2', '緊急連絡先⓶ : ') !!}
                {!! Form::text('emergency_contact_2', $patient->emergency_contact_2 ? $patient->emergency_contact_2 : old('emergency_contact_2'), ['class' => 'form-control', 'placeholder' => 'ハイフン不要(例: 09012345678)']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('relationship_2', '続柄⓶ : ') !!}
                {!! Form::text('relationship_2', $patient->relationship_2 ? $patient->relationship_2 : old('relationship_2'), ['class' => 'form-control']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('emergency_contact_postal_code_2', '緊急連絡先の郵便番号⓶ : ') !!}
                {!! Form::text('emergency_contact_postal_code_2', $patient->emergency_contact_postal_code_2 ? $patient->emergency_contact_postal_code_2 : old('emergency_contact_postal_code_2'), ['class' => 'form-control', 'placeholder' => 'ハイフン不要(例:1234567)']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('emergency_contact_address_2', '緊急連絡先の住所⓶ : ') !!}
                {!! Form::text('emergency_contact_address_2', $patient->emergency_contact_address_2 ? $patient->emergency_contact_address_2 : old('emergency_contact_address_2'), ['class' => 'form-control']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('family_hospital', '医療機関 :') !!}
                {!! Form::text('family_hospital', $patient->family_hospital ? $patient->family_hospital : old('family_hospital'), ['class' => 'form-control']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('family_hospital_contact', '医療機関の連絡先 :') !!}
                {!! Form::text('family_hospital_contact', $patient->family_hospital_contact ? $patient->family_hospital_contact : old('family_hospital_contact'), ['class' => 'form-control', 'placeholder' => 'ハイフン不要(例: 09012345678)']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('family_hospital_postal_code', '医療機関の郵便番号 : ') !!}
                {!! Form::text('family_hospital_postal_code', $patient->family_hospital_postal_code ? $patient->family_hospital_postal_code : old('family_hospital_postal_code'), ['class' => 'form-control', 'placeholder' => 'ハイフン不要(例:1234567)']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('family_hospital_address', '医療機関の住所 : ') !!}
                {!! Form::text('family_hospital_address', $patient->family_hospital_address ? $patient->family_hospital_address : old('family_hospital_address'), ['class' => 'form-control']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('doctor', '主治医 :') !!}
                {!! Form::text('doctor', $patient->doctor ? $patient->doctor : old('doctor'), ['class' => 'form-control']) !!}
            </div>
            
             <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('disease_name', '病名 : ') !!}
                {!! Form::text('disease_name', $patient->disease_name ? $patient->disease_name : old('disease_name'), ['class' => 'form-control']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('clinical_history', '病歴 :') !!}
                {!! Form::textarea('clinical_history', $patient->clinical_history ? $patient->clinical_history : old('clinical_history'), ['class' => 'form-control', 'placeholder' => 'どのようなことが原因で、いつ医療機関を受診し、どのような治療を受けたのかなどをできる限り記入。']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('medical_history', '既往歴 :') !!}
                {!! Form::textarea('medical_history', $patient->medical_history ? $patient->medical_history : old('medical_history'), ['class' => 'form-control', 'placeholder' => '精神疾患以外の病気や、かかりつけ医療機関があれば記入。', 'rows' => '3']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('life_history', '生活歴 :') !!}
                {!! Form::textarea('life_history', $patient->life_history ? $patient->life_history : old('life_history'), ['class' => 'form-control', 'placeholder' => '利用者の性格や育った家庭環境などをできる限り記入。']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('family_structure', '家族構成 :') !!}
                {!! Form::textarea('family_structure', $patient->family_structure ? $patient->family_structure : old('family_structure'), ['class' => 'form-control', 'placeholder' => '家族状況と、利用者を支援する中でキーパーソンとなる家族をできる限り記入。', 'rows' => '3']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('academic_background', '学歴 :') !!}
                {!! Form::textarea('academic_background', $patient->academic_background ? $patient->academic_background : old('academic_background'), ['class' => 'form-control', 'placeholder' => '例: 平成XX年X月 YY大学卒業', 'rows' => '2']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('work_experience', '職歴 :') !!}
                {!! Form::textarea('work_experience', $patient->work_experience ? $patient->work_experience : old('work_experience'), ['class' => 'form-control', 'placeholder' => '例: 平成XX年X月～令和YY年Y月  Z会社の事務職として10年勤務', 'rows' => '2']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('economic_condition', '経済状況 :') !!}
                {!! Form::textarea('economic_condition', $patient->economic_condition ? $patient->economic_condition : old('economic_condition'), ['class' => 'form-control', 'placeholder' => '例: 就労継続支援A型事業所の収入 10万/月、両親の仕送り 3万/月', 'rows' => '2']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('related_organization', '関係機関 :') !!}
                {!! Form::textarea('related_organization', $patient->related_organization ? $patient->related_organization : old('related_organization'), ['class' => 'form-control', 'placeholder' => '担当者、連絡先も記入。', 'rows' => '4']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('welfare_service', '福祉サービス等 :') !!}
                {!! Form::textarea('welfare_service', $patient->welfare_service ? $patient->welfare_service : old('welfare_service'), ['class' => 'form-control', 'placeholder' => '障害年金、障害者手帳など', 'rows' => '3']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group">
                {!! Form::label('image', '画像資料 : ') !!}<br>
                {!! Form::file('image', ['id' => 'preview-uploader', 'class' => 'form-control']) !!}
                
                <!-- 画像プレビュー -->
                <div id="preview" class="mt-3"></div>
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('consideration', '支援にあたり配慮すべきこと :') !!}
                {!! Form::textarea('consideration', $patient->consideration ? $patient->consideration : old('consideration'), ['class' => 'form-control', 'placeholder' => '障害特性に関わる具体的な内容をできる限り記入', 'rows' => '5']) !!}
            </div>
            
            <!-- 1行 -->
            <div class="form-group mt-4">
                {!! Form::label('other', 'その他 :') !!}
                {!! Form::textarea('other', $patient->other ? $patient->other : old('other'), ['class' => 'form-control', 'rows' => '3']) !!}
            </div>
            
    </div>
            {!! Form::submit('更新', ['class' => 'offset-sm-4 col-sm-4 mt-5 btn btn-primary']) !!}
        {!! Form::close() !!}
    
    {!! link_to_route('patients.show', '利用者ID:' . $patient->id .'の登録情報の詳細へ戻る', ['id' => $patient->id ], ['class' => 'mt-4 mb-5 offset-sm-4 col-sm-4 btn btn-danger']) !!}
        
@endsection
            