<?php
include "rain.php";
$zipArchive = $argv[1];
$dir = substr($zipArchive, 0, -4);
exec('unzip '.$zipArchive.' -d '.$dir.' ');
exec ("python3 mergeJSON.py $dir");
sleep(5);
// Путь к JSON файлу
$json_file = "jsonForArchive_".$dir.".json";

// Чтение содержимого файла
$json_data = file_get_contents($json_file);

// Декодирование JSON в массив PHP
$data = json_decode($json_data, true);

// Проверяем на ошибки декодирования
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Ошибка при декодировании JSON: ' . json_last_error_msg());
}

// Открываем файл output.html для записи
$output_file = "dastReportForArchive".$dir.".html";
$html = fopen($output_file, 'w');
$html_content = <<<HTML
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js"></script>
    <title>DAST Report For Archive $dir </title>
  </head>
  <body>
  <div class="content">
    <div style="padding:10px" class="">
      <h2 class="mb-5">DAST Report For Archive $dir</h2>
      <div class="table-responsive">
        <table class="table custom-table">
          <thead>
            <tr>
                <label class="control control--checkbox">
                  <input type="checkbox" class="js-check-all"/>
                </label>
              </th>
              <th style="text-align: center;" scope="col">ID</th>
              <th scope="col">Tamplate Path</th>
              <th scope="col">Matched At</th>
              <th scope="col">Response</th>
              <th scope="col">Curl</th>
            </tr>
          </thead>
          <tbody>
HTML;

$id = 1;
foreach ($data as $item) {
    $path = $item['template-id'];
    $path2 = substr($path, 26);
    $matcher_status = $item['matcher-status'] ? "true" : "false";
    $request = urldecode($item['matched-at']);
    $code = $item['response'];
    $code = substr($code, 9, 3);
    $curl = urldecode($item['curl-command']);
    $code = substr($curl, 1);
    //$time = $item['timestamp'];
    //$time = substr($time, 11, 11);
    $html_content .= <<<HTML
        <tr>
            <td style="min-width: 150px; text-align: center;" >{$id}</td>
            <td>{$path}</td>
            <td style="max-width: 200px; word-wrap: break-word;">{$request}</td>
            <td style="max-width: 500px; word-wrap: break-word;">{$item['response']}</td>
            <td style="max-width: 500px; word-wrap: break-word;">{$curl}</td>
        </tr>
HTML;
$id++; // Увеличиваем ID для следующей записи
}

// Закрытие таблицы и HTML
$html_content .= <<<HTML
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </body>
</html>
HTML;

// Записываем весь HTML-контент в файл и закрываем его
fwrite($html, $html_content);
fclose($html);
echo "Создан отчет dastReportForArchive".$dir.".html";
?>
