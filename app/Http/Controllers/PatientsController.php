<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\Rules\Postal_code; // 郵便番号のルール追加
use App\Rules\Phone_number; // 電話番号のルール追加

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Patientモデルを使って全利用者を昇順で取得
        $patients = Patient::orderBy('id', 'asc')->paginate(10);
        
        // キーワードは空文字の設定
        $keyword = '';
        
        // viewの呼び出し
        return view('top', compact('patients', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 空のPatientモデル作成
        $patient = new Patient();
        // view の呼び出し
        return view('patients.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 入力された値の検証
        $this->validate($request, [
            'name' => 'required',
            'postal_code' => ['nullable', new Postal_code],
            'phone_number_1' => ['nullable', new Phone_number],
            'phone_number_2' => ['nullable', new Phone_number],
            'emergency_contact_1' => ['nullable', new Phone_number],
            'emergency_contact_postal_code_1' => ['nullable', new Postal_code],
            'emergency_contact_2' => ['nullable', new Phone_number],
            'emergency_contact_postal_code_2' => ['nullable', new Postal_code],
            'family_hospital_contact' => ['nullable', new Phone_number],
            'family_hospital_postal_code' => ['nullable', new Postal_code],
            'image' => [
                'file',
                'mimes:jpeg,jpg,png'
            ]
        ]);
        
        // 入力情報の取得
        $name = $request->input('name');
        $birthday = $request->input('birthday');
        $gender = $request->input('gender');
        $postal_code = $request->input('postal_code');
        $address = $request->input('address');
        $phone_number_1 = $request->input('phone_number_1');
        $phone_number_2 = $request->input('phone_number_2');
        $email = $request->input('email');
        $emergency_contact_1 = $request->input('emergency_contact_1');
        $relationship_1 = $request->input('relationship_1');
        $emergency_contact_postal_code_1 = $request->input('emergency_contact_postal_code_1');
        $emergency_contact_address_1 = $request->input('emergency_contact_address_1');
        $emergency_contact_2 = $request->input('emergency_contact_2');
        $relationship_2 = $request->input('relationship_2');
        $emergency_contact_postal_code_2 = $request->input('emergency_contact_postal_code_2');
        $emergency_contact_address_2 = $request->input('emergency_contact_address_2');
        $family_hospital = $request->input('family_hospital');
        $family_hospital_contact = $request->input('family_hospital_contact');
        $family_hospital_postal_code = $request->input('family_hospital_postal_code');
        $family_hospital_address = $request->input('family_hospital_address');
        $doctor= $request->input('doctor');
        $disease_name = $request->input('disease_name');
        $clinical_history = $request->input('clinical_history');
        $medical_history = $request->input('medical_history');
        $life_history = $request->input('life_history');
        $family_structure = $request->input('family_structure');
        $academic_background = $request->input('academic_background');
        $work_experience = $request->input('work_experience');
        $economic_condition = $request->input('economic_condition');
        $related_organization = $request->input('related_organization');
        $welfare_service = $request->input('welfare_service');
        $file =  $request->image;
        $consideration = $request->input('consideration');
        $other = $request->input('other');
        
        // 画像のアップロード
        // https://qiita.com/ryo-program/items/35bbe8fc3c5da1993366
        if($file){
            // 現在時刻ともともとのファイル名を組み合わせてランダムなファイル名作成
            $image = time() . $file->getClientOriginalName();
            // アップロードするフォルダ名取得
            $target_path = public_path('uploads/');
            // アップロード処理
            $file->move($target_path, $image);
        }else{
            // 画像が選択されていなければ空文字をセット
            $image = '';
        }
        
        // 入力情報をもとに新しいpatientインスタンス作成
        \Auth::user()->patients()->create([
            'name' => $name, 
            'birthday' => $birthday, 
            'gender' => $gender,
            'postal_code' => $postal_code,
            'address' => $address,
            'phone_number_1' => $phone_number_1,
            'phone_number_2' => $phone_number_2,
            'email' => $email,
            'emergency_contact_1' => $emergency_contact_1,
            'relationship_1' => $relationship_1,
            'emergency_contact_postal_code_1' => $emergency_contact_postal_code_1,
            'emergency_contact_address_1' => $emergency_contact_address_1,
            'emergency_contact_2' => $emergency_contact_2,
            'relationship_2' => $relationship_2,
            'emergency_contact_postal_code_2' => $emergency_contact_postal_code_2,
            'emergency_contact_address_2' => $emergency_contact_address_2,
            'family_hospital' => $family_hospital,
            'family_hospital_contact' => $family_hospital_contact,
            'family_hospital_postal_code' => $family_hospital_postal_code,
            'family_hospital_address' => $family_hospital_address,
            'doctor' => $doctor,
            'disease_name' => $disease_name,
            'clinical_history' => $clinical_history,
            'medical_history' => $medical_history,
            'life_history' => $life_history,
            'family_structure' => $family_structure,
            'academic_background' => $academic_background,
            'work_experience' => $work_experience,
            'economic_condition' => $economic_condition,
            'related_organization' => $related_organization,
            'welfare_service' => $welfare_service,
            'image' => $image,
            'consideration' => $consideration,
            'other' => $other
        ]);
        
        // トップページへリダイレクト
        return redirect('/top')->with('flash_message', '新規利用者登録を完了しました。');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        // view の呼び出し
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        // view の呼び出し
        // 職員全員が利用者の登録情報の編集ができるようにするため条件分岐はしない
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        // 入力された値の検証
        $this->validate($request, [
            'name' => 'required',
            'postal_code' => ['nullable', new Postal_code],
            'phone_number_1' => ['nullable', new Phone_number],
            'phone_number_2' => ['nullable', new Phone_number],
            'emergency_contact_1' => ['nullable', new Phone_number],
            'emergency_contact_postal_code_1' => ['nullable', new Postal_code],
            'emergency_contact_2' => ['nullable', new Phone_number],
            'emergency_contact_postal_code_2' => ['nullable', new Postal_code],
            'family_hospital_contact' => ['nullable', new Phone_number],
            'family_hospital_postal_code' => ['nullable', new Postal_code],
            'image' => [
                'file',
                'mimes:jpeg,jpg,png'
            ]
        ]);
        
        // 入力情報の取得
        $name = $request->input('name');
        $birthday = $request->input('birthday');
        $gender = $request->input('gender');
        $postal_code = $request->input('postal_code');
        $address = $request->input('address');
        $phone_number_1 = $request->input('phone_number_1');
        $phone_number_2 = $request->input('phone_number_2');
        $email = $request->input('email');
        $emergency_contact_1 = $request->input('emergency_contact_1');
        $relationship_1 = $request->input('relationship_1');
        $emergency_contact_postal_code_1 = $request->input('emergency_contact_postal_code_1');
        $emergency_contact_address_1 = $request->input('emergency_contact_address_1');
        $emergency_contact_2 = $request->input('emergency_contact_2');
        $relationship_2 = $request->input('relationship_2');
        $emergency_contact_postal_code_2 = $request->input('emergency_contact_postal_code_2');
        $emergency_contact_address_2 = $request->input('emergency_contact_address_2');
        $family_hospital = $request->input('family_hospital');
        $family_hospital_contact = $request->input('family_hospital_contact');
        $family_hospital_postal_code = $request->input('family_hospital_postal_code');
        $family_hospital_address = $request->input('family_hospital_address');
        $doctor= $request->input('doctor');
        $disease_name = $request->input('disease_name');
        $clinical_history = $request->input('clinical_history');
        $medical_history = $request->input('medical_history');
        $life_history = $request->input('life_history');
        $family_structure = $request->input('family_structure');
        $academic_background = $request->input('academic_background');
        $work_experience = $request->input('work_experience');
        $economic_condition = $request->input('economic_condition');
        $related_organization = $request->input('related_organization');
        $welfare_service = $request->input('welfare_service');
        $file =  $request->image;
        $consideration = $request->input('consideration');
        $other = $request->input('other');
        
        // 画像のアップロード
        // https://qiita.com/ryo-program/items/35bbe8fc3c5da1993366
        if($file){
            // 現在時刻ともともとのファイル名を組み合わせてランダムなファイル名作成
            $image = time() . $file->getClientOriginalName();
            // アップロードするフォルダ名取得
            $target_path = public_path('uploads/');
            // アップロード処理
            $file->move($target_path, $image);
        }else{
            // 画像が選択されていなければ、元の画像名のまま
            $image = $patient->image;
        }
        
        // 入力情報をもとにpatientインスタンス情報の更新
        $patient->name = $name;
        $patient->birthday = $birthday;
        $patient->gender = $gender;
        $patient->postal_code = $postal_code;
        $patient->address = $address;
        $patient->phone_number_1 = $phone_number_1;
        $patient->phone_number_2 = $phone_number_2;
        $patient->email = $email;
        $patient->emergency_contact_1 = $emergency_contact_1;
        $patient->relationship_1 = $relationship_1;
        $patient->emergency_contact_postal_code_1 = $emergency_contact_postal_code_1;
        $patient->emergency_contact_address_1 = $emergency_contact_address_1;
        $patient->emergency_contact_2 = $emergency_contact_2;
        $patient->relationship_2 = $relationship_2;
        $patient->emergency_contact_postal_code_2 = $emergency_contact_postal_code_2;
        $patient->emergency_contact_address_2 = $emergency_contact_address_2;
        $patient->family_hospital = $family_hospital;
        $patient->family_hospital_contact = $family_hospital_contact;
        $patient->family_hospital_postal_code = $family_hospital_postal_code;
        $patient->family_hospital_address = $family_hospital_address;
        $patient->doctor = $doctor;
        $patient->disease_name = $disease_name;
        $patient->clinical_history = $clinical_history;
        $patient->medical_history = $medical_history;
        $patient->life_history = $life_history;
        $patient->family_structure = $family_structure;
        $patient->academic_background = $academic_background;
        $patient->work_experience = $work_experience;
        $patient->economic_condition = $economic_condition;
        $patient->related_organization = $related_organization;
        $patient->welfare_service = $welfare_service;
        $patient->image = $image;
        $patient->consideration = $consideration;
        $patient->other = $other;
        
        // データベースを更新
        $patient->save();
        
        // view の呼び出し
        return redirect('/top')->with('flash_message', '利用者ID: ' . $patient->id . 'の『' . $patient->name . '』の登録情報を更新しました。');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        // データベースから削除
        $patient->delete();
        // リダイレクト
        return redirect('/top')->with('flash_message', '利用者ID: ' . $patient->id . 'の『' . $patient->name . '』の登録情報を削除しました');
    }
    
    // 利用者のキーワード検索
    public function search(Request $request){
        
        // 入力された検索キーワードを取得
        $keyword = $request->input('keyword');

        // 検索(ID, 利用者名、病名で検索可能にする)
        $patients = Patient::where('id','like', '%' . $keyword . '%')
                    ->orWhere('name', 'like', '%' . $keyword . '%')
                    ->orWhere('disease_name', 'like', '%' . $keyword . '%')
                    ->paginate(10);
       
        // キーワードがなければフラッシュメッセージをnull
        if($keyword === null) {
           $flash_message = null;
        
        // キーワードがヒットしなければ
        } else if($patients->count() === 0) {
            $flash_message = '検索キーワード: 『 ' . $keyword . ' 』に何もヒットしませんでした';
            
        } else {
            // フラッシュメッセージのセット
            $flash_message = '検索キーワード: 『 ' . $keyword . ' 』に' . $patients->count() . '件ヒットしました';
        }
        
        // view の呼び出し
        return view('/top', compact('patients', 'keyword', 'flash_message'));
    }

}
