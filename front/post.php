<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Tabipost - 投稿フォーム</title>
    <script>
        function switchLocation(value) {
            document.getElementById('domestic_box').style.display = (value === 'domestic') ? 'block' : 'none';
            document.getElementById('overseas_box').style.display = (value === 'overseas') ? 'block' : 'none';
        }
    </script>
</head>
<body>
    <h1>あなたの旅について</h1>

    <form action="../back/save_post.php" method="POST">
        <p>
            ユーザー名：<input type="text" name="username" required>
        </p>
        <p>
            タイトル：<input type="text" name="title" required>
        </p>
        <p>
            行き先の種類：
            <select name="location_type" onchange="switchLocation(this.value)">
                <option value="domestic">国内</option>
                <option value="overseas">海外</option>
            </select>
        </p>

        <p id="domestic_box">
            都道府県：
            <select name="location">
                <option value="">選択してください</option>
                <?php
                $prefs = ["北海道","青森県","岩手県","宮城県","秋田県","山形県","福島県",
                            "茨城県","栃木県","群馬県","埼玉県","千葉県","東京都","神奈川県",
                            "新潟県","富山県","石川県","福井県","山梨県","長野県",
                            "岐阜県","静岡県","愛知県","三重県",
                            "滋賀県","京都府","大阪府","兵庫県","奈良県","和歌山県",
                            "鳥取県","島根県","岡山県","広島県","山口県",
                            "徳島県","香川県","愛媛県","高知県",
                            "福岡県","佐賀県","長崎県","熊本県","大分県","宮崎県","鹿児島県","沖縄県"];
                foreach ($prefs as $pref) {
                    echo "<option value=\"$pref\">$pref</option>";
                }
                ?>
            </select>
        </p>

        <p id="overseas_box" style="display:none;">
            国名：
            <select name="location_overseas">
                <option value="">選択してください</option>
                <?php
                $countries = [
                    "アメリカ合衆国", "イギリス", "カナダ", "フランス", "ドイツ",
                    "オーストラリア", "イタリア", "スペイン", "中国", "韓国", "台湾",
                    "タイ", "シンガポール", "ベトナム", "インドネシア", "マレーシア", "フィリピン","その他"
                ];
                foreach ($countries as $country) {
                    echo "<option value=\"$country\">$country</option>";
                }
                ?>
            </select>
        </p>

        <p>
            内容：<br>
            <textarea name="content" rows="5" cols="40" placeholder="旅の感想などをどうぞ！" required></textarea>
        </p>

        <p>
            <button type="submit">投稿する</button>
        </p>
    </form>

    <p><a href="index.php">← 投稿一覧に戻る</a></p>
</body>
</html>

