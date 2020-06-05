<!doctype html>

<html>
    <head>
        <title>Программа "Контроль студентов"</title>
        <meta charset = "UTF-8">
        <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity = "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin = "anonymous"> 
        <link rel = "stylesheet" href = "style.css">
    </head>

    <body>
        <form class = "form-signin" method = "POST">
                        <h2 class="section-title">Таблица посещаемости</h2>
                        <div>
                            <table>
                                <tr>
                                    <th class = "a">ФИО</th>
                                    <th class = "b">Название предмета</th>
                                    <th class = "b">Количество пропущенных часов</th>
                                </tr>
                            
                                <?php  
			                        require('connect.php');
                                    $query = mysqli_query($connection, "SELECT * FROM table_it4");
                                    $numrows = mysqli_num_rows($query);
                                    $i = 0;
                                    while($row = mysqli_fetch_assoc($query)){
                                        $i++;
                                        if ($i % 3 == 0) {
                                            echo '<tr><td class = "a">'.$row['FIO'].'</td><td class = "b">'.$row['subject'].'</td><td class = "c">'.$row['hours'].'</td></tr>';
                                        } else if ($i % 3 != 0) {
                                            echo '<tr><td class = "a">'.$row['FIO'].'</td><td class = "b">'.$row['subject'].'</td><td class = "c">'.$row['hours'].'</td>';
                                        } else if($i == $numrows){
                                            echo '<tr><td class = "a">'.$row['FIO'].'</td><td class = "b">'.$row['subject'].'</td><td class = "c">'.$row['hours'].'</td></tr>';
                                        }
                                    }
                                ?> 
                            </table>  
                            <br> 
                            <a href = 'main.php' class = 'btn btn-lg btn-primary'>Назад</a>
                        </div>
        </form>
    </body>
</html>