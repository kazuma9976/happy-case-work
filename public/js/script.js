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
  function deleteAlert(){
    if(window.confirm('本当に削除してよろしいですか？')) {
    
    } else {
      return false;
    }
  }
  
});