/* global $*/
$(function(){
  // メイン画像のアニメーション(fadein/fadeout)）
  const images = [
      'images/network1.jpg', 
      'images/network2.jpg', 
      'images/network3.jpg',
      'images/network4.jpg',
      'images/network5.jpg'
    ];
    
  let ff_count = 1;
  // opacityを使用したアニメーション。
  const fadein_fadeout = () => {
      $('#mainVisual img').animate({'opacity': 0}, 1000, () => {
          $('#mainVisual img').prop('src', images[ff_count]);
          $('#mainVisual img').animate({'opacity': 1});
          ff_count++;
          if(ff_count === images.length){
              ff_count = 0;
          }
      });
  };
  
  // 5秒間隔で実行
  setInterval(fadein_fadeout, 5000);
  
  // 利用者の登録情報削除時の確認アラート関数
  $('#delete_patient').on('click', () => {
      if(window.confirm('この利用者のすべてのデータが消えます。本当に削除してよろしいですか？')) {
        
      } else {
        return false;
      }
    
  });
  
  // 利用者の登録情報削除時の確認アラート関数
  $('#delete_record').on('click', () => {
      if(window.confirm('この相談記録のデータが消えます。本当に削除してよろしいですか？')) {
        
      } else {
        return false;
      }
    
  });
  
  // 業務日誌の削除時の確認アラート関数
  $('#delete_log').on('click', () => {
      if(window.confirm('この業務日誌のデータが消えます。本当に削除してよろしいですか？')) {
        
      } else {
        return false;
      }
    
  });
  
  // 各種画像のプレビュー表示
  $(document).on('change', '#preview-uploader', function(){
        //操作された要素を取得
        let image = this;
        //ファイルを読み取るオブジェクトを生成
        let fileReader = new FileReader();
        //ファイルを読み取る
        fileReader.readAsDataURL(image.files[0]);
        
        // ファイルを読み取り後
        fileReader.onload = (function () {                        
            //img要素を生成
            let imgTag = `<img src='${fileReader.result}'>`;     
            //画像を表示
            $(image).next("#preview").html(imgTag);               
        });
    });
  
});