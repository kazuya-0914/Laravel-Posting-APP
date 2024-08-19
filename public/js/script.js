// ログアウトをGETメソッドからPOSTメソッドに変換
const logOut = document.getElementById('logout');
logOut.addEventListener('click', (e) => {
  e.preventDefault();
  document.getElementById('logout-form').submit();
});

// 削除ボタン
const delBtn = document.getElementById('del-btn');
delBtn.addEventListener('submit', (e) => {
  const confirmDelete = confirm('本当に削除してもよろしいですか？');
  if (!confirmDelete) {
    e.preventDefault;
  }
});