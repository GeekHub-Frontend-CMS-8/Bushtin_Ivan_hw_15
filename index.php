<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Home work 15</title>
</head>
<body>
<?php
if (isset($_POST['submit'])) {

    $name = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $family_status = $_POST['family_status'];
    $social_status = $_POST['social_status'];
    $address = $_POST['address'];
    $weekend = implode(',', $_POST['weekend']);
    $site_frequency = $_POST['site_frequency'];
    $books = $_POST['books'];
    $comment = $_POST['comment'];
    $select_position = $_POST['select_position'];
    $email = $_POST['email'];
    $categories = implode(',', $_POST['categories']);
    $task = $_POST['task'];

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_base = "form";
    $db_table = "form";

    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_base);

    if ($mysqli->connect_error) {
        die('Ошибка : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $result = $mysqli->query("INSERT INTO " . $db_table . " (firstname,lastname,sex,age,gender,birthday,family_status,social_status,address,weekend,site_frequency,books,comment,select_position,email,categories,task) VALUES ('$name','$lastname','$sex','$age','$gender','$birthday','$family_status','$social_status','$address','$weekend','$site_frequency','$books','$comment','$select_position','$email','$categories','$task')");

    if ($result == true) {
        echo "Информация занесена в базу данных";
    } else {
        echo "Информация не занесена в базу данных";
    }
}
?>
<form action="" method="post" name="about">
    <fieldset class="about">
        <legend>Коротко о себе</legend>
        <label for="firstname"> Имя:
            <input type="text" name="firstname" id="firstname" required>
        </label>
        <label for="lastname"> Фамилия:
            <input type="text" name="lastname" id="lastname" required>
        </label>
        <label for="sex1" class="flex"> Пол:
            <input type="radio" name="sex" id="sex1" value="мужской" required> мужской
        </label>
        <label for="sex2" class="flex">
            <input type="radio" name="sex" id="sex2" value="женский" required> женский
        </label>
        <label for="age">Возраст:
            <input type="number" name="age" id="age" required> лет
        </label>
    </fieldset>
    <fieldset>
        <legend>Подробней о себе</legend>
        <label for="sex3">
            <input type="radio" name="gender" id="sex3" value="Молодой человек" required> Молодой человек
        </label>
        <label for="sex4">
            <input type="radio" name="gender" id="sex4" value="Девушка" required> Девушка
        </label>
        <label for="birthday">
            <input type="date" name="birthday" id="birthday" required> Дата рождения
        </label>
        <label for="family_status">
            <input type="text" name="family_status" id="family_status" required> Семейное положение
        </label>
        <label for="social_status">
            <input type="text" name="social_status" id="social_status" required> Социальное положение
        </label>
        <label for="address">
            <input type="text" name="address" id="address" required> Место жительства
        </label>

        <h4>Что вы обычно делаете на выходных:</h4>

        <label for="sleep">
            <input type="checkbox" name="weekend[]" id="sleep" value="Сплю"> Сплю
        </label>
        <label for="relax">
            <input type="checkbox" name="weekend[]" id="relax" value="Отдыхаю с друзьями"> Отдыхаю с друзьями
        </label>
        <label for="fishing">
            <input type="checkbox" name="weekend[]" id="fishing" value="Хожу на рыбалку"> Хожу на рыбалку
        </label>
        <label for="games">
            <input type="checkbox" name="weekend[]" id="games" value="Играю в игры"> Играю в игры
        </label>
        <h4>Рассказать о формах в книге, посвященной HTML</h4>

        <label for="site_frequency">
            <select name="site_frequency" id="site_frequency">
                <option value="site_frequency">Site frequency:</option>
                <option value="site_frequency2">Site frequency2:</option>
                <option value="site_frequency3">Site frequency3:</option>
            </select>
        </label>

        <h4>Сколько книг вы прочли за свою жизнь:</h4>

        <label for="books_0-10">
            <input type="radio" name="books" id="books_0-10" value="0-10"> 0-10
        </label>
        <label for="books_11-20">
            <input type="radio" name="books" id="books_11-20" value="11-20"> 11-20
        </label>
        <label for="books_21-50">
            <input type="radio" name="books" id="books_21-50" value="21-50"> 21-50
        </label>
        <label for="books_50+">
            <input type="radio" name="books" id="books_50+" value="50+"> 50+
        </label>
        <label for="comment" class="indent">Ваши комментарии:
            <textarea name="comment" id="comment" rows="5" cols="50"></textarea>
        </label>
        <label for="select_position">
            <select name="select_position" id="select_position" size="3">
                <option value="First position">Первая позиция</option>
                <option value="Second position">Вторая позиция</option>
                <option value="Third position">Третья позиция</option>
            </select>
        </label>
    </fieldset>
    <fieldset>
        <legend>И в заключении:</legend>
        <label for="field1">
            <input type="text" name="field1" id="field1" placeholder="Это поле было введено до вас" readonly>
        </label>
        <label for="email" class="indent"> Email:
            <input type="email" name="email" id="email" required>
        </label>

        <h4 class="h4Margin">Хотите на самую модную рассылку спама?</h4>
        <p>Выберите категории</p>

        <label for="categories1">
            <input type="checkbox" name="categories[]" id="categories1" value="Оборудование"> Оборудование
        </label>
        <label for="categories2">
            <input type="checkbox" name="categories[]" id="categories2" value="Как приготовить обеды"> Как приготовить обеды
        </label>
        <label for="categories3">
            <input type="checkbox" name="categories[]" id="categories3" value="Заработай миллион за два дня!"> Заработай миллион за два дня!
        </label>

        <h4>На сколько сложная задача:</h4>

        <label for="task1">
            <input type="radio" name="task" id="task1" value="Совсем нет" required> Совсем нет
        </label>
        <label for="task2">
            <input type="radio" name="task" id="task2" value="Так себе" required> Так себе
        </label>
        <label for="task3">
            <input type="radio" name="task" id="task3" value="Еле справилась" required> Еле справилась
        </label>
    </fieldset>
    <label for="send">
        <input type="submit" name="submit" value="Отправить" id="send">
    </label>
</form>
</body>
</html>